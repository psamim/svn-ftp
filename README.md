README of svn-ftp
=================

* This application is licenced under [GNU General Public License, Version 3.0]

Summary
-------

SVN powered FTP client written in PHP.


About
-----

I use SVN to track changes of my projects, mostly in PHP. Considering I have 
only FTP access to the server, I needed a way to upload only the modified/new files 
to the server, and not the whole project.

This script asks SVN about modified, added or removed files since the last push to the server,
and then uploads them via FTP or removes the removed files. Also it updates the file 
containing the latest revision number pushed to the server (.revision file).

There is an option (`--zip` or `-z`) to zip the files, upload them and then unzip them on the
server to save time and bandwidth (PHP required on the server). FTP credentials are saved to
an ini file.

Also there are options for uploading a single file (`--file<=FILE>` or `-f<FILE>`), updating 
the .revision file on the server to a specific revision number (`--update[=NUMBER]` or `-u[NUMBER]`) and uploading
a specific revision (`--revision<=NUMBER>` or `-r<NUMBER>`).

Installing
----------

- Make sure svn-ftp.php is executable (`chmod +x svn-ftp.php`).
- Create a symbolic link from svn-ftp.php to '\usr\local\bin' (`ln -sf 'FULL/PATH/svn-ftp.php' '/usr/local/bin/svn-ftp').
- Copy config.ini.template to config.ini, review the configurations (```cp 'config.ini.template' 'config.ini'```).

You can do these two steps by running install.sh as root. svn-ftp should be called from inside root
of a svn repository which is confugured for svn-ftp (has .svn-ftp directory).


First time
-----------

    $ cd my_svn_project
    $ svn-ftp init

Usage
------
	$ svn commit -m 'my commit'
    $ svn-ftp

Known Issues
------------

* See [svn-ftp issues on GitHub] for open issues

Limitations
-----------

* Windows and OS X: I have not tested this script on Windows and OS X. Thanks for helping me out fixing bugs on these platforms.

Contributions
-------------

Don't hesitate to use GitHub to improve this tool. Don't forget to add yourself to the [AUTHORS](AUTHORS) file.

[GNU General Public License, Version 3.0]: http://www.gnu.org/licenses/gpl-3.0-standalone.html