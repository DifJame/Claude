<?php
/* =====================================================================
   _live-lib.php  -  helper library for the LIVE demo (/new.v2/)
   READ-ONLY from infoblock IBLOCK_ID=10. Production site is not changed.
   Included by *-live.php after Bitrix kernel (prolog_before.php).

   ВАЖНО про кодировку: PHP-код этого файла намеренно в ASCII (спецсимволы
   выводятся HTML-сущностями), чтобы файл не ломался, даже если его пересохранят
   в windows-1251 (редактор Bitrix). Значения фильтра ниже - кириллица (она
   безопасна для 1251); сравнение идёт через live_to_utf8() с обеих сторон.
   ===================================================================== */

/* ---------------------------------------------------------------------
   CONFIG. Property codes and deal/type values. Real values: see
   /new.v2/live-filter-debug.php
   --------------------------------------------------------------------- */
$GLOBALS['MCO_CFG'] = [
  'iblock'     => 10,

  // Object detail URL.
  //  DEMO: /new.v2/object-live.php?id=%d   (stay inside /new.v2/)
  //  PROD: replace with  /realestate/%d/
  'detail_url' => '/new.v2/object-live.php?id=%d',

  // Property codes in infoblock 10
  'prop_deal'  => 'DEAL',   // deal: rent / sale
  'prop_dest'  => 'DEST',   // type: apartment / office

  // Candidate values (text). Works for list (enum) and string properties.
  // If the filter does not work - put REAL values from live-filter-debug.php here.
  'deal' => [
    'rent' => ['аренда', 'снять', 'в аренду', 'rent'],
    'sale' => ['продажа', 'купить', 'на продажу', 'sale'],
  ],
  'dest' => [
    'apartment' => ['апартаменты', 'апартамент', 'квартира', 'квартиры', 'apartment', 'flat'],
    'office'    => ['офис', 'офисы', 'офисное', 'office'],
  ],
];

if (!function_exists('mco_h')) {
  /** Safe output (htmlspecialchars) */
  function mco_h($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
}

/**
 * Force string to UTF-8.
 * Already-UTF-8 is kept; windows-1251 is converted; numbers/empty/arrays safe.
 */
function live_to_utf8($value) {
  if (is_array($value)) {
    return array_map('live_to_utf8', $value);
  }
  if ($value === null || $value === false) {
    return '';
  }
  $value = (string)$value;
  if ($value === '') {
    return '';
  }
  if (function_exists('mb_check_encoding') && mb_check_encoding($value, 'UTF-8')) {
    return $value;
  }
  if (function_exists('iconv')) {
    $converted = @iconv('windows-1251', 'UTF-8//IGNORE', $value);
    if ($converted !== false) {
      return $converted;
    }
  }
  if (function_exists('mb_convert_encoding')) {
    return mb_convert_encoding($value, 'UTF-8', 'windows-1251');
  }
  return $value;
}

/** Convert to UTF-8 + escape */
function live_e($value) {
  return htmlspecialchars(live_to_utf8($value), ENT_QUOTES, 'UTF-8');
}

function mco_lower($s) { return function_exists('mb_strtolower') ? mb_strtolower(trim((string)$s), 'UTF-8') : strtolower(trim((string)$s)); }

/** Object detail URL from config template (demo/prod) */
function mco_detail_url($id) {
  $tpl = isset($GLOBALS['MCO_CFG']['detail_url']) ? $GLOBALS['MCO_CFG']['detail_url'] : '/new.v2/object-live.php?id=%d';
  return sprintf($tpl, intval($id));
}

/** Fallback images from the prototype (object has no photo) */
function mco_fallback($i = 0) {
  $imgs = [
    '/new.v2/assets/hero/slide-1.jpg',
    '/new.v2/assets/hero/slide-2.jpg',
    '/new.v2/assets/hero/slide-3.jpg',
    '/new.v2/assets/hero/slide-4.jpg',
  ];
  return $imgs[$i % count($imgs)];
}

/** Bitrix file URL by id; '' if none */
function mco_file_url($fileId) {
  $fileId = intval($fileId);
  if ($fileId <= 0 || !class_exists('CFile')) return '';
  $path = @CFile::GetPath($fileId);
  return $path ? $path : '';
}

/** Normalize PHOTO property value to array of file-id */
function mco_photo_ids($prop) {
  if (empty($prop) || empty($prop['VALUE'])) return [];
  $v = $prop['VALUE'];
  if (is_array($v)) return array_values(array_filter($v));
  return [$v];
}

/** Price string. TOTAL_PRICE over PRICE; '' if empty. Ruble sign as HTML entity. */
function mco_price($props) {
  $val = '';
  if (!empty($props['TOTAL_PRICE']['VALUE'])) $val = trim((string)$props['TOTAL_PRICE']['VALUE']);
  elseif (!empty($props['PRICE']['VALUE']))   $val = trim((string)$props['PRICE']['VALUE']);
  if ($val === '') return '';
  $raw = preg_replace('/\s+/', '', $val);
  if (ctype_digit($raw)) $val = number_format((float)$raw, 0, '.', ' ');
  return '&#8381; ' . mco_h($val); // &#8381; = rouble sign
}

/** Specs line, units (m2 / floor) rendered as HTML entities; empties skipped. */
function mco_meta($props) {
  $parts = [];
  if (!empty($props['KVAD']['VALUE']))   $parts[] = mco_h(trim((string)$props['KVAD']['VALUE'])) . ' &#1084;&#178;';            // m2
  if (!empty($props['FLOOR_']['VALUE'])) $parts[] = mco_h(trim((string)$props['FLOOR_']['VALUE'])) . ' &#1101;&#1090;&#1072;&#1078;'; // floor
  return implode(' &#183; ', $parts); // &#183; = middot
}

/** Location: tower, else address */
function mco_loc($props) {
  if (!empty($props['TOWER']['VALUE']))  return mco_h(trim((string)$props['TOWER']['VALUE']));
  if (!empty($props['ADRESS']['VALUE'])) return mco_h(trim((string)$props['ADRESS']['VALUE']));
  return '';
}

/**
 * Enum-IDs of a list property whose VALUE matches candidates.
 * Both sides normalized via live_to_utf8 -> works regardless of source/DB charset.
 * [] if property is not a list / no match (then filter by string).
 */
function mco_prop_enum_ids($iblock, $code, $candidates) {
  $ids = [];
  if (!class_exists('CIBlockPropertyEnum')) return $ids;
  $cand = [];
  foreach ($candidates as $c) $cand[] = mco_lower(live_to_utf8($c));
  $rs = @CIBlockPropertyEnum::GetList([], ['IBLOCK_ID' => intval($iblock), 'CODE' => $code]);
  if (!$rs) return $ids;
  while ($e = $rs->GetNext()) {
    if (in_array(mco_lower(live_to_utf8($e['VALUE'])), $cand, true)) $ids[] = $e['ID'];
  }
  return $ids;
}

/**
 * Get objects from IBLOCK_ID=10 by a ready CIBlockElement filter.
 * Returns normalized items (escaped + UTF-8).
 */
function mco_get_objects($filter, $count = 6) {
  $out = [];
  if (!class_exists('CModule') || !CModule::IncludeModule('iblock')) return $out;
  $select = ['ID', 'IBLOCK_ID', 'NAME', 'PREVIEW_TEXT', 'DETAIL_TEXT'];
  $rs = CIBlockElement::GetList(['SORT' => 'ASC', 'ID' => 'DESC'], $filter, false, ['nTopCount' => intval($count)], $select);
  $i = 0;
  while ($el = $rs->GetNextElement()) {
    $f = live_to_utf8($el->GetFields());
    $p = live_to_utf8($el->GetProperties());
    $id = intval($f['ID']);
    $photo = '';
    foreach (mco_photo_ids(isset($p['PHOTO']) ? $p['PHOTO'] : null) as $pid) {
      $u = mco_file_url($pid);
      if ($u) { $photo = $u; break; }
    }
    if (!$photo) $photo = mco_fallback($i);
    $out[] = [
      'id'       => $id,
      'name'     => (string)$f['NAME'],
      'url'      => mco_detail_url($id),         // demo: /new.v2/object-live.php?id=ID
      'real_url' => '/realestate/' . $id . '/',  // production URL (reference)
      'price'    => mco_price($p),
      'meta'     => mco_meta($p),
      'loc'      => mco_loc($p),
      'photo'    => $photo,
    ];
    $i++;
  }
  return $out;
}

/**
 * Main preset query:
 *   getLiveObjects(["deal"=>"rent","type"=>"office","limit"=>12])
 * deal: rent|sale ; type: apartment|office ; limit: int
 * Filter is built on the Bitrix side (CIBlockElement::GetList).
 */
function getLiveObjects($args = []) {
  $cfg    = $GLOBALS['MCO_CFG'];
  $iblock = intval($cfg['iblock']);
  $deal   = isset($args['deal']) ? $args['deal'] : null;
  $type   = isset($args['type']) ? $args['type'] : null;
  $limit  = isset($args['limit']) ? intval($args['limit']) : 6;

  $filter = ['IBLOCK_ID' => $iblock, 'ACTIVE' => 'Y'];

  if ($deal && isset($cfg['deal'][$deal])) {
    $cand = $cfg['deal'][$deal];
    $ids  = mco_prop_enum_ids($iblock, $cfg['prop_deal'], $cand);
    $filter['PROPERTY_' . $cfg['prop_deal']] = $ids ? $ids : array_map('live_to_utf8', $cand);
  }
  if ($type && isset($cfg['dest'][$type])) {
    $cand = $cfg['dest'][$type];
    $ids  = mco_prop_enum_ids($iblock, $cfg['prop_dest'], $cand);
    $filter['PROPERTY_' . $cfg['prop_dest']] = $ids ? $ids : array_map('live_to_utf8', $cand);
  }
  return mco_get_objects($filter, $limit);
}

/** Render normalized items as .prop cards */
function mco_render_items($items) {
  if (empty($items)) {
    echo "\n          <!-- No objects for this filter, or iblock module unavailable. Check values in live-filter-debug.php. -->\n";
    return;
  }
  foreach ($items as $it) {
    echo '          <a class="prop" href="' . mco_h($it['url']) . '">' . "\n";
    echo '            <div class="prop__media"><i style="background-image:url(\'' . mco_h($it['photo']) . '\')"></i></div>' . "\n";
    echo '            <div class="prop__body">';
    if ($it['loc'] !== '')   echo '<div class="prop__loc">' . $it['loc'] . '</div>';
    echo '<h3>' . mco_h($it['name']) . '</h3>';
    if ($it['meta'] !== '')  echo '<div class="prop__meta">' . $it['meta'] . '</div>';
    if ($it['price'] !== '') echo '<div class="prop__price">' . $it['price'] . '</div>';
    echo '</div>' . "\n";
    echo '          </a>' . "\n";
  }
}

/** Cards by ready filter */
function mco_render_cards($filter, $count = 6) { mco_render_items(mco_get_objects($filter, $count)); }

/** Cards by preset (deal/type/limit) */
function mco_render_live($args = []) { mco_render_items(getLiveObjects($args)); }

/** Get ONE object by ID for the object page. null if none. */
function mco_get_object($id, $iblock = 10) {
  $id = intval($id);
  if ($id <= 0) return null;
  if (!class_exists('CModule') || !CModule::IncludeModule('iblock')) return null;
  $rs = CIBlockElement::GetList([], ['IBLOCK_ID' => intval($iblock), 'ID' => $id, 'ACTIVE' => 'Y'], false, false,
    ['ID', 'IBLOCK_ID', 'NAME', 'PREVIEW_TEXT', 'DETAIL_TEXT']);
  $el = $rs->GetNextElement();
  if (!$el) return null;
  $f = live_to_utf8($el->GetFields());
  $p = live_to_utf8($el->GetProperties());
  $photos = [];
  foreach (mco_photo_ids(isset($p['PHOTO']) ? $p['PHOTO'] : null) as $pid) {
    $u = mco_file_url($pid);
    if ($u) $photos[] = $u;
  }
  $cfgp = $GLOBALS['MCO_CFG'];
  $pd = isset($p[$cfgp['prop_deal']]) ? $p[$cfgp['prop_deal']] : null;
  $pt = isset($p[$cfgp['prop_dest']]) ? $p[$cfgp['prop_dest']] : null;
  $dealV = ($pd && !empty($pd['VALUE'])) ? (is_array($pd['VALUE']) ? implode(', ', $pd['VALUE']) : $pd['VALUE']) : '';
  $destV = ($pt && !empty($pt['VALUE'])) ? (is_array($pt['VALUE']) ? implode(', ', $pt['VALUE']) : $pt['VALUE']) : '';
  $dealE = ($pd && !empty($pd['VALUE_ENUM_ID'])) ? (is_array($pd['VALUE_ENUM_ID']) ? reset($pd['VALUE_ENUM_ID']) : $pd['VALUE_ENUM_ID']) : '';
  $destE = ($pt && !empty($pt['VALUE_ENUM_ID'])) ? (is_array($pt['VALUE_ENUM_ID']) ? reset($pt['VALUE_ENUM_ID']) : $pt['VALUE_ENUM_ID']) : '';
  $desc = (isset($f['DETAIL_TEXT']) && $f['DETAIL_TEXT'] !== '') ? $f['DETAIL_TEXT'] : (isset($f['PREVIEW_TEXT']) ? $f['PREVIEW_TEXT'] : '');
  return [
    'id'        => $id,
    'name'      => (string)$f['NAME'],
    'url'       => mco_detail_url($id),
    'real_url'  => '/realestate/' . $id . '/',
    'price'     => mco_price($p),
    'kvad'      => !empty($p['KVAD']['VALUE'])   ? trim((string)$p['KVAD']['VALUE'])   : '',
    'floor'     => !empty($p['FLOOR_']['VALUE']) ? trim((string)$p['FLOOR_']['VALUE']) : '',
    'tower'     => !empty($p['TOWER']['VALUE'])  ? trim((string)$p['TOWER']['VALUE'])  : '',
    'adress'    => !empty($p['ADRESS']['VALUE']) ? trim((string)$p['ADRESS']['VALUE']) : '',
    'deal'      => trim((string)$dealV),
    'dest'      => trim((string)$destV),
    'deal_enum' => $dealE,
    'dest_enum' => $destE,
    'desc'      => (string)$desc,
    'photos'    => $photos,
  ];
}

/** Price per m2 (if price and area are numeric) - else ''. Symbols as entities. */
function mco_meter($obj) {
  $priceDigits = preg_replace('/[^0-9]/', '', $obj['price']);
  $kvad = (float)str_replace(',', '.', preg_replace('/[^0-9,\.]/', '', $obj['kvad']));
  if ($priceDigits === '' || $kvad <= 0) return '';
  $per = round(((float)$priceDigits) / $kvad);
  // approx price per square meter; symbols/words output as HTML entities
  return '&#8776; ' . number_format($per, 0, '.', ' ') . ' &#8381; &#1079;&#1072; &#1084;&#178;';
}

/**
 * Similar objects for the object page: same DEST (type) if known, exclude current id;
 * fallback to active objects without current id.
 */
function mco_get_similar($obj, $count = 3) {
  $cfg  = $GLOBALS['MCO_CFG'];
  $base = ['IBLOCK_ID' => intval($cfg['iblock']), 'ACTIVE' => 'Y', '!ID' => intval($obj['id'])];
  $items = [];
  if (!empty($obj['dest_enum'])) {
    $items = mco_get_objects($base + ['PROPERTY_' . $cfg['prop_dest'] => $obj['dest_enum']], $count);
  } elseif (!empty($obj['dest'])) {
    $items = mco_get_objects($base + ['PROPERTY_' . $cfg['prop_dest'] => live_to_utf8($obj['dest'])], $count);
  }
  if (count($items) < 1) $items = mco_get_objects($base, $count);
  return $items;
}
?>
