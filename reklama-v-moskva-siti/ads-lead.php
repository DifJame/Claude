<?php
/* =========================================================================
   Обработчик заявок страницы «Реклама в Москва-Сити».
   Разместить как /local/ads-city/ads-lead.php (action форм указывает сюда).
   Создаёт лид в CRM с меткой [Реклама в Москва-Сити]; fallback — письмо.
   ========================================================================= */
define('NO_KEEP_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !check_bitrix_sessid()) {
    echo json_encode(['status' => 'error', 'message' => 'bad request']);
    die();
}

$p = function ($k) { return isset($_POST[$k]) ? trim((string)$_POST[$k]) : ''; };
$label  = $p('service') ?: '[Реклама в Москва-Сити]';
$format = $p('format') ?: $p('format_selected');                 // формат всегда в заявке
$descr  = "Формат: {$format}; Период: ".$p('period')."; Ролик: ".$p('creative').
          "; Бюджет: ".$p('budget')."; Компания: ".$p('company')."; Комментарий: ".$p('comment');

$name  = $p('name');
$phone = $p('phone');

if ($name === '' || $phone === '') {
    echo json_encode(['status' => 'error', 'message' => 'Заполните имя и телефон']);
    die();
}

if (CModule::IncludeModule('crm')) {
    $lead = new CCrmLead(false);
    $id = $lead->Add([
        'TITLE'              => $label.' — '.$name,
        'NAME'               => $name,
        'SOURCE_ID'          => 'WEB',
        'SOURCE_DESCRIPTION' => $descr,
        'COMMENTS'           => $descr,
        'PHONE'              => [['VALUE' => $phone, 'VALUE_TYPE' => 'WORK']],
    ], true, ['DISABLE_USER_FIELD_CHECK' => true]);

    echo json_encode($id
        ? ['status' => 'success', 'id' => $id]
        : ['status' => 'error', 'message' => $lead->LAST_ERROR]);
} else {
    $to = COption::GetOptionString('main', 'email_from');
    $body = "{$label}\nИмя: {$name}\nТелефон: {$phone}\n{$descr}";
    bxmail($to, $label, $body, "Content-Type: text/plain; charset=utf-8");
    echo json_encode(['status' => 'success']);
}
die();
