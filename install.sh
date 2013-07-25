#!/bin/bash


if [[ $EUID -ne 0 ]]; then
  echo "Run as root" 2>&1
  exit 1
else

chmod +x "$PWD/svn-ftp.php"

sudo ln -sf "$PWD/svn-ftp.php" "/usr/local/bin/svn-ftp"

cp "$PWD/config.ini.template" "$PWD/config.ini"

fi

echo "Install completed."
echo "See config.ini for configurations."
echo "Run 'svn-ftp help' for more information."
