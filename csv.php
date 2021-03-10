<?php
require_once 'car_shop_data.php';
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=CarShopInfo.csv");
header("Content-Transfer-Encoding: binary");

$csv = '"Shop name","address","tell"' . "\n";

foreach ($carShopInfoList as $value) {
    $csv .= '"' . $value['shop_name'] . '","' . $value['address'] . '", ' . $value['tell'] . "\n";
}

echo $csv;
return;


