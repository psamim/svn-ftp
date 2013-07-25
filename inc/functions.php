<?php

/**
 * FUNCTIONS NEEDED
 */

 // Makes directory recursively on FTP
function ftp_mksubdirs($ftpcon,$ftpbasedir,$ftpath){
   @ftp_chdir($ftpcon, $ftpbasedir); // /var/www/uploads
   $parts = explode('/',$ftpath); // 2013/06/11/username
   foreach($parts as $part){
      if(!@ftp_chdir($ftpcon, $part)){
         ftp_mkdir($ftpcon, $part);
         ftp_chdir($ftpcon, $part);
         //ftp_chmod($ftpcon, 0777, $part);
      }
   }
}

// Removes Directories Recursively locally
function delTree($dir) { 
   $files = array_diff(scandir($dir), array('.','..')); 
    foreach ($files as $file) { 
      (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
    } 
    return rmdir($dir); 
  } 


/**
 * parseArgs Command Line Interface (CLI) utility function.
 * @author              Patrick Fisher <patrick@pwfisher.com>
 * @see                 https://github.com/pwfisher/CommandLine.php
 */
function parseArgs($argv = null) {
    $argv = $argv ? $argv : $_SERVER['argv']; array_shift($argv); $o = array();
    for ($i = 0, $j = count($argv); $i < $j; $i++) { $a = $argv[$i];
        if (substr($a, 0, 2) == '--') { $eq = strpos($a, '=');
            if ($eq !== false) { $o[substr($a, 2, $eq - 2)] = substr($a, $eq + 1); }
            else { $k = substr($a, 2);
                if ($i + 1 < $j && $argv[$i + 1][0] !== '-') { $o[$k] = $argv[$i + 1]; $i++; }
                else if (!isset($o[$k])) { $o[$k] = true; } } }
        else if (substr($a, 0, 1) == '-') {
            if (substr($a, 2, 1) == '=') { $o[substr($a, 1, 1)] = substr($a, 3); }
            else {
                foreach (str_split(substr($a, 1)) as $k) { if (!isset($o[$k])) { $o[$k] = true; } }
                if ($i + 1 < $j && $argv[$i + 1][0] !== '-') { $o[$k] = $argv[$i + 1]; $i++; } } }
        else { $o[] = $a; } }
    return $o;
}


// Functions
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}


// Colors for bash
define('SUCCESS', "\033[32mSUCCESS\033[37m" );
define('FAIL', "\033[31m   FAIL\033[37m" );
define('NOTICE', "\033[33m NOTICE\033[37m");
define('WARNING', "\033[31mWARNING\033[37m");
define('IGNORED', "\033[33mIGNORED\033[37m");

function bye() {
  global $pwd, $config;
  delTree( $pwd . '/' .$config['temp'] );die();
}