<?php
define('NO_KEEP_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

header('Content-Type: application/json; charset=utf-8');

$logFile = $_SERVER['DOCUMENT_ROOT'].'/local/ads-city-test/ads-lead-test.log';

function ads_test_log($text) {
    global $logFile;
    @file_put_contents($logFile, '['.date('Y-m-d H:i:s').'] '.$text."\n", FILE_APPEND);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !check_bitrix_sessid()) {
    ads_test_log('BAD REQUEST: method='.$_SERVER['REQUEST_METHOD'].' post='.print_r($_POST, true));
    echo json_encode(array('status' => 'error', 'message' => 'bad request'));
    die();
}

$p = function ($k) {
    return isset($_POST[$k]) ? trim((string)$_POST[$k]) : '';
};

$name    = $p('name');
$phone   = $p('phone');
$surface = $p('format') ?: $p('format_selected');
$page    = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/reklama-v-moskva-siti-test/';

if ($name === '' || $phone === '') {
    ads_test_log('EMPTY REQUIRED: '.print_r($_POST, true));
    echo json_encode(array('status' => 'error', 'message' => 'Заполните имя и телефон'));
    die();
}

if ($surface === '' || $surface === 'Заявка из попапа') {
    $surface = 'Общая заявка на подбор поверхности';
}

$label = 'Реклама в Москва-Сити';

$descr = "Поверхность: {$surface}\nИсточник: попап на странице рекламы";

/**
 * 1. Telegram / VK через общий FormNotifier
 */
$notifyOk = false;
$notifierFile = $_SERVER['DOCUMENT_ROOT'].'/local/notify/FormNotifier.php';

if (is_file($notifierFile)) {
    require_once $notifierFile;

    if (class_exists('FormNotifier')) {
        $notifyOk = FormNotifier::createFromConfig()->notify(array(
            'source'  => 'Реклама в Москва-Сити',
            'name'    => $name,
            'phone'   => $phone,
            'email'   => '',
            'comment' => $descr,
            'page'    => $page,
            'request' => array(
                'surface' => $surface,
                'form'    => $page,
            ),
        ));
    }
}

/**
 * 2. Дублируем на почту
 */
$mailOk = false;
$to = 'w.moscowcity.pro@gmail.com';

if ($to !== '') {
    $body = "{$label}\nИмя: {$name}\nТелефон: {$phone}\n{$descr}\nСтраница: {$page}";
    $mailOk = bxmail($to, $label, $body, "Content-Type: text/plain; charset=utf-8");
}

ads_test_log(
    'RESULT: mail='.($mailOk ? '1' : '0').
    ' notify='.($notifyOk ? '1' : '0').
    ' surface='.$surface.
    ' post='.print_r($_POST, true)
);

if ($notifyOk || $mailOk) {
    echo json_encode(array(
        'status'   => 'success',
        'telegram' => $notifyOk ? 1 : 0,
        'mail'     => $mailOk ? 1 : 0,
        'message'  => 'ok'
    ));
    die();
}

echo json_encode(array(
    'status'   => 'error',
    'telegram' => 0,
    'mail'     => 0,
    'message'  => 'Заявка не была отправлена'
));
die();
