<?php
/* ЖИВОЙ DEBUG свойств фильтра (/new.v2/live-filter-debug.php).
   Показывает реальные значения PROPERTY_DEAL и PROPERTY_DEST у активных объектов
   IBLOCK_ID=10, чтобы заполнить конфиг фильтра в _live-lib.php.
   ТОЛЬКО ЧТЕНИЕ. Ничего не меняет. Закрыт от индексации. */
header('Content-Type: text/html; charset=UTF-8');
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
header('Content-Type: text/html; charset=UTF-8'); // повторно после ядра (на случай 1251 в настройках Bitrix)
@ini_set('display_errors', '0');
require_once(__DIR__ . "/_live-lib.php");

$cfg       = $GLOBALS['MCO_CFG'];
$IBLOCK    = intval($cfg['iblock']);
$PROP_DEAL = $cfg['prop_deal'];
$PROP_DEST = $cfg['prop_dest'];
$LIMIT     = 50;

$rows = [];
$distinctDeal = [];
$distinctDest = [];
$propMeta = [];

$ok = (class_exists('CModule') && CModule::IncludeModule('iblock'));

if ($ok) {
  // типы свойств DEAL/DEST
  $rsP = CIBlockProperty::GetList([], ['IBLOCK_ID' => $IBLOCK, 'CODE' => [$PROP_DEAL, $PROP_DEST]]);
  while ($pr = $rsP->Fetch()) {
    $propMeta[$pr['CODE']] = ['NAME' => live_to_utf8($pr['NAME']), 'TYPE' => $pr['PROPERTY_TYPE'], 'LIST_TYPE' => $pr['LIST_TYPE']];
  }

  $rs = CIBlockElement::GetList(
    ['SORT' => 'ASC', 'ID' => 'DESC'],
    ['IBLOCK_ID' => $IBLOCK, 'ACTIVE' => 'Y'],
    false,
    ['nTopCount' => $LIMIT],
    ['ID', 'IBLOCK_ID', 'NAME']
  );
  while ($el = $rs->GetNextElement()) {
    $f = live_to_utf8($el->GetFields());
    $p = live_to_utf8($el->GetProperties());
    $deal = isset($p[$PROP_DEAL]) ? $p[$PROP_DEAL] : null;
    $dest = isset($p[$PROP_DEST]) ? $p[$PROP_DEST] : null;
    $dealVal  = $deal && isset($deal['VALUE']) ? (is_array($deal['VALUE']) ? implode(', ', $deal['VALUE']) : $deal['VALUE']) : '';
    $destVal  = $dest && isset($dest['VALUE']) ? (is_array($dest['VALUE']) ? implode(', ', $dest['VALUE']) : $dest['VALUE']) : '';
    $dealEnum = $deal && isset($deal['VALUE_ENUM_ID']) ? (is_array($deal['VALUE_ENUM_ID']) ? implode(', ', (array)$deal['VALUE_ENUM_ID']) : $deal['VALUE_ENUM_ID']) : '';
    $destEnum = $dest && isset($dest['VALUE_ENUM_ID']) ? (is_array($dest['VALUE_ENUM_ID']) ? implode(', ', (array)$dest['VALUE_ENUM_ID']) : $dest['VALUE_ENUM_ID']) : '';
    $dealXml  = $deal && isset($deal['VALUE_XML_ID']) ? (is_array($deal['VALUE_XML_ID']) ? implode(', ', (array)$deal['VALUE_XML_ID']) : $deal['VALUE_XML_ID']) : '';
    $destXml  = $dest && isset($dest['VALUE_XML_ID']) ? (is_array($dest['VALUE_XML_ID']) ? implode(', ', (array)$dest['VALUE_XML_ID']) : $dest['VALUE_XML_ID']) : '';
    $priceVal = !empty($p['TOTAL_PRICE']['VALUE']) ? $p['TOTAL_PRICE']['VALUE'] : (!empty($p['PRICE']['VALUE']) ? $p['PRICE']['VALUE'] : '');
    $kvadVal  = !empty($p['KVAD']['VALUE'])  ? $p['KVAD']['VALUE']  : '';
    $towerVal = !empty($p['TOWER']['VALUE']) ? $p['TOWER']['VALUE'] : '';
    if ($dealVal !== '') $distinctDeal[$dealVal] = isset($distinctDeal[$dealVal]) ? $distinctDeal[$dealVal] + 1 : 1;
    if ($destVal !== '') $distinctDest[$destVal] = isset($distinctDest[$destVal]) ? $distinctDest[$destVal] + 1 : 1;
    $rows[] = ['id' => intval($f['ID']), 'name' => (string)$f['NAME'], 'deal' => $dealVal, 'dealEnum' => $dealEnum, 'dealXml' => $dealXml, 'dest' => $destVal, 'destEnum' => $destEnum, 'destXml' => $destXml, 'price' => $priceVal, 'kvad' => $kvadVal, 'tower' => $towerVal];
  }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="robots" content="noindex, nofollow" />
  <title>Live filter debug — DEAL / DEST (IBLOCK 10)</title>
  <link rel="stylesheet" href="/new.v2/assets/tokens.css?v=live1" />
  <style>
    body{background:var(--bg);color:var(--ink);font-family:var(--font);padding:32px;max-width:1100px;margin:0 auto;}
    h1{font-size:26px;font-weight:300;letter-spacing:-.02em;margin-bottom:6px;}
    p.sub{color:var(--ink-2);margin-bottom:24px;}
    h2{font-size:18px;font-weight:400;margin:28px 0 12px;}
    table{width:100%;border-collapse:collapse;font-size:13.5px;margin-bottom:18px;}
    th,td{text-align:left;padding:8px 10px;border-bottom:1px solid var(--line);vertical-align:top;}
    th{color:var(--ink-3);text-transform:uppercase;letter-spacing:.08em;font-size:11px;}
    code{color:var(--accent);background:rgba(var(--accent-rgb),.1);padding:1px 6px;border-radius:4px;}
    .pill{display:inline-block;border:1px solid var(--line-2);border-radius:999px;padding:2px 10px;margin:2px 4px 2px 0;font-size:12px;}
    .warn{color:#d9a05b;}
    a{color:var(--accent);}
  </style>
</head>
<body data-theme="obsidian">
  <h1>Live filter debug · IBLOCK <?= intval($IBLOCK) ?></h1>
  <p class="sub">Реальные значения свойств <code><?= mco_h($PROP_DEAL) ?></code> (сделка) и <code><?= mco_h($PROP_DEST) ?></code> (тип) у активных объектов. По ним заполните конфиг в <code>_live-lib.php</code>. Файл только читает данные и закрыт от индексации.</p>

<?php if (!$ok): ?>
  <p class="warn">Модуль iblock недоступен — откройте файл на боевом сервере Bitrix.</p>
<?php else: ?>

  <h2>Свойства фильтра</h2>
  <table>
    <tr><th>Код</th><th>Название</th><th>Тип</th><th>Подсказка</th></tr>
    <?php foreach ([$PROP_DEAL, $PROP_DEST] as $code): $m = isset($propMeta[$code]) ? $propMeta[$code] : null; ?>
    <tr>
      <td><code><?= mco_h($code) ?></code></td>
      <td><?= $m ? mco_h($m['NAME']) : '<span class="warn">не найдено</span>' ?></td>
      <td><?= $m ? mco_h($m['TYPE'] . ($m['LIST_TYPE'] ? '/' . $m['LIST_TYPE'] : '')) : '—' ?></td>
      <td><?= $m ? ($m['TYPE'] === 'L' ? 'список (enum) — фильтр по ID значения' : 'строка/число — фильтр по тексту') : 'проверьте код свойства' ?></td>
    </tr>
    <?php endforeach; ?>
  </table>

  <h2>Уникальные значения <?= mco_h($PROP_DEAL) ?> (сделка)</h2>
  <div>
    <?php if ($distinctDeal): foreach ($distinctDeal as $v => $c): ?>
      <span class="pill"><?= mco_h($v) ?> · <?= intval($c) ?></span>
    <?php endforeach; else: ?><span class="warn">нет значений — проверьте код свойства DEAL</span><?php endif; ?>
  </div>

  <h2>Уникальные значения <?= mco_h($PROP_DEST) ?> (тип объекта)</h2>
  <div>
    <?php if ($distinctDest): foreach ($distinctDest as $v => $c): ?>
      <span class="pill"><?= mco_h($v) ?> · <?= intval($c) ?></span>
    <?php endforeach; else: ?><span class="warn">нет значений — проверьте код свойства DEST</span><?php endif; ?>
  </div>

  <h2>Объекты (первые <?= intval($LIMIT) ?> активных)</h2>
  <table>
    <tr><th>ID</th><th>Название</th><th><?= mco_h($PROP_DEAL) ?> VALUE</th><th>ENUM</th><th>XML_ID</th><th><?= mco_h($PROP_DEST) ?> VALUE</th><th>ENUM</th><th>XML_ID</th><th>PRICE</th><th>KVAD</th><th>TOWER</th></tr>
    <?php foreach ($rows as $r): ?>
    <tr>
      <td><a href="/new.v2/object-live.php?id=<?= intval($r['id']) ?>" target="_blank"><?= intval($r['id']) ?></a></td>
      <td><?= mco_h($r['name']) ?></td>
      <td><?= mco_h($r['deal']) ?: '<span class="warn">&#8212;</span>' ?></td>
      <td><?= mco_h($r['dealEnum']) ?></td>
      <td><?= mco_h($r['dealXml']) ?></td>
      <td><?= mco_h($r['dest']) ?: '<span class="warn">&#8212;</span>' ?></td>
      <td><?= mco_h($r['destEnum']) ?></td>
      <td><?= mco_h($r['destXml']) ?></td>
      <td><?= mco_h($r['price']) ?></td>
      <td><?= mco_h($r['kvad']) ?></td>
      <td><?= mco_h($r['tower']) ?></td>
    </tr>
    <?php endforeach; ?>
  </table>

  <p class="sub">Как заполнить: возьмите тексты из «Уникальных значений» и впишите их в массивы <code>deal</code> и <code>dest</code> конфига <code>MCO_CFG</code> в <code>_live-lib.php</code>. Для списков (тип L) фильтр сам найдёт ID по тексту.</p>
<?php endif; ?>

</body>
</html>
