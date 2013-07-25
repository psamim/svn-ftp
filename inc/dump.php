<?php
$error = 0;
$mysql_error = '';    
$result = array();

$action1 = (isset($_REQUEST['a1'])) ? $_REQUEST['a1'] : $argv[1];
$action2 = (isset($_REQUEST['a2'])) ? $_REQUEST['a2'] : $argv[2];
$action3 = (isset($_REQUEST['a3'])) ? $_REQUEST['a3'] : $argv[3];

switch ($action1) {
    case 'unzip':
            $file = 'zip.zip';
            // get the absolute path to $file
            $path = pathinfo(realpath($file), PATHINFO_DIRNAME);
            $zip = new ZipArchive;
            $res = $zip->open($file);
            if ($res === TRUE) {
              // extract it to the path we determined above
              $zip->extractTo($path);
              $zip->close();
              $error = 0;
            } else {
              $error = 1;
            }
            break;
}
echo $error;
exit($error);