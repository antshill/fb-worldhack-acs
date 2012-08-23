fb-worldhack-acs
================

Austin Childrens Shelter World HACK

In /etc/extra/httpd-vhosts.conf add the following:

<VirtualHost *:80>
    ServerAdmin webmaster@dummy-host.example.com
    DocumentRoot "/Applications/XAMPP/xamppfiles/htdocs/github/fb-worldhack-acs/public"
  DirectoryIndex index.php
    ServerName acs.fbworldhack.com
    ServerAlias acs.fbworldhack.com
    ErrorLog "/Applications/XAMPP/xamppfiles/htdocs/github/fb-worldhack-acs/log/error_log"
    CustomLog "/Applications/XAMPP/xamppfiles/htdocs/github/fb-worldhack-acs/log/access_log" common
</VirtualHost>

<VirtualHost *:80>
    ServerAdmin webmaster@dummy-host.example.com
    DocumentRoot "/Applications/XAMPP/xamppfiles/htdocs/github/fb-worldhack-acs/public/ws"
  DirectoryIndex index.php
    ServerName acs-api.fbworldhack.com
    ServerAlias acs-api.fbworldhack.com
    ErrorLog "/Applications/XAMPP/xamppfiles/htdocs/github/fb-worldhack-acs/log/ws_error_log"
    CustomLog "/Applications/XAMPP/xamppfiles/htdocs/github/fb-worldhack-acs/log/ws_access_log" common
</VirtualHost>


In /etc/httpd.conf

Comment in Line 469:
 Include /Applications/XAMPP/etc/extra/httpd-vhosts.conf
