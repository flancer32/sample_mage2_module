<?php
/**
 * Merge 2 JSON files.
 */
require_once(__DIR__ . '/../work/vendor/autoload.php');

if($argc >= 2) {
    /* parse arguments: $src $additions */
    $src = $argv[1];
    $adds = $argv[2];
    /* load original 'composer.json ' and unset necessary data */
    $main = load_json($src);
    $main->unsetData('/minimum-stability');
    /* load additional options */
    $opts = load_json($adds);
    /* merge both JSONs and save as source with suffix '.merged' */
    $arrMerged = array_merge_recursive($main->getData(), $opts->getData());
    $jsonMerged = json_encode($arrMerged, JSON_UNESCAPED_SLASHES);
    file_put_contents($src . '.merged.json', $jsonMerged);
    /* backup original source file and replace it by merged */
    $tstamp = date('.YmdHis');
    rename($src, $src . $tstamp);
    rename($src . '.merged.json', $src);
} else {
    $iam = __FILE__;
    echo "\nUsage: $iam 'source_file.json' 'additions.json'";
}
return;


function load_json($file) {
    $jsonMain = file_get_contents($file);
    $arrMain = json_decode($jsonMain, true);
    $dataMain = new \Flancer32\Lib\DataObject($arrMain);
    return $dataMain;
}