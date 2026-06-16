<?php
/* Диагностика кодировки (/new.v2/charset-test.php). Только чтение, noindex. */
header('Content-Type: text/html; charset=UTF-8');
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
header('Content-Type: text/html; charset=UTF-8');
@ini_set('display_errors', '0');
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <title>Charset test</title>
  <style>body{font-family:system-ui,Arial,sans-serif;background:#1A1B1D;color:#ECEFF3;padding:32px;line-height:1.6}code{color:#6F9BD1}</style>
</head>
<body>
  <h1>Проверка кодировки</h1>
  <p>Русский текст должен отображаться нормально: Москва-Сити, апартаменты, аренда, продажа.</p>
  <p>LANG_CHARSET (кодировка ядра Bitrix): <code><?= defined('LANG_CHARSET') ? htmlspecialchars(LANG_CHARSET, ENT_QUOTES, 'UTF-8') : 'not defined' ?></code></p>
  <p>Если выше «windows-1251» — значит данные из Bitrix приходят в 1251, и их конвертирует <code>live_to_utf8()</code> в <code>_live-lib.php</code>. На live-страницах текст должен быть без «кракозябр».</p>
</body>
</html>
