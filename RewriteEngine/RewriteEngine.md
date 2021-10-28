RewriteEngine On
RewriteCond %{HTTP_HOST} ^www.printerphonesupport.com [NC]
RewriteRule ^(.*)$ https://printerphonesupport.com/$1 [L,R=301]

RewriteEngine On
RewriteCond %{SERVER_PORT} 80
RewriteRule ^(.*)$ https://printerphonesupport.com/$1 [R,L]

Redirect 301 /home/ https://printerphonesupport.com

Redirect 301 /hp/ https://printerphonesupport.com/support-hp-printers.php

Redirect 301 /canon/ https://printerphonesupport.com/support-canon-printers.php

Redirect 301 /espon/ https://printerphonesupport.com/support-espon-printers.php

Redirect 301 /brother/ https://printerphonesupport.com/support-brother-printers.php

Redirect 301 /care/  https://printerphonesupport.com/print-care-pack.php

Redirect 301 /robots/ https://printerphonesupport.com/robots.txt

<IfModule mod_headers.c>

    <FilesMatch "\.(html|php)$">
        Header set Cache-Control "no-cache, no-store, must-revalidate"
        Header set Pragma "no-cache"
        Header set Expires 0
    </FilesMatch>

    <FilesMatch "\.(ico|pdf|jpg|png|gif|js|css)$">
        Header set Cache-Control "max-age=172800, public, must-revalidate"
    </FilesMatch>

</IfModule>

# RewriteOptions inherit

# RewriteEngine on
# RewriteCond %{HTTP_HOST} ^.*$
# RewriteRule ^/?$ "https\:\/\/printerphonesupport\.com\/" [R=301,L]
