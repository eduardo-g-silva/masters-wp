# How to Setup your webserver
Now you should point your url to the web folder of the new project.

##If you are using Apache
You can create a new file call 'example_dev.conf' in your /etc/apache2/sites-available folder with something like this:
```
  <VirtualHost *:80>
      ServerAdmin whatevername@whatever.org
      ServerName example.dev
      ServerAlias www.example.dev
      DocumentRoot /var/www/example/web
      ErrorLog ${APACHE_LOG_DIR}/example_error.log
      CustomLog ${APACHE_LOG_DIR}/example_access.log combined
  </VirtualHost>
```

Then of course:
Add the url to your host file: `/etc/hosts`
`127.0.1.1       example.dev`

Make apache recognize the config file:
`sudo a2ensite example_dev.conf`

And reload apache
`sudo service apache2 reload`

##If you are using Ngnx
you can create a new configuration file at `/etc/nginx/` can be something like that:

```
server {
    charset utf-8;
    client_max_body_size 128M;

    listen 80; ## listen for ipv4
    #listen [::]:80 default_server ipv6only=on; ## listen for ipv6

    server_name example.dev;
    root        /var/www/example/web;
    index       index.php;

    access_log  /path/to/basic/log/example_access.log;
    error_log   /path/to/basic/log/example_error.log;

    location / {
        # Redirect everything that isn't a real file to index.php
        try_files $uri $uri/ /index.php$is_args$args;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_pass 127.0.0.1:9000;
        #fastcgi_pass unix:/var/run/php5-fpm.sock;
        try_files $uri =404;
    }

    location ~* /\. {
        deny all;
    }
}
```

Then restart nginx
`service nginx reload`

---

Then remember to add the url to your host file: `/etc/hosts`
`127.0.1.1       example.dev`
