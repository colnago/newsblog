INSTALLATION
------------

~~~
composer install
~~~


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=newsblog',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
```

Apply migrations by running the command:

~~~
php yii migrate
~~~

### Apache

Add the following to Nginx nginx.conf or virtual host config file. Remember to replace path/to/newsblog/web with the correct path to newsblog/web.

~~~
    server {
        root    path/to/newsblog/web;
        listen  0.0.0.0:8080;
        server_name newsblog;
        charset utf-8;
        client_max_body_size 128M;
        index index.php index.html index.htm index.nginx-debian.html;

        location /storage/ {
            root path/to/newsblog;
        }

        location / {
            try_files $uri $uri/ =404;
        }

        location ~ ^/assets/.*\.php$ {
            deny all;
        }

        location ~ \.php$ {
                #fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
                fastcgi_pass 127.0.0.1:9000;
                fastcgi_index index.php;
                fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
                include fastcgi_params;
        }

        location ~* /\. {
            deny all;
        }
    }
~~~

### Hosts file

Add the following to hosts file:

~~~
127.0.0.1 newsblog
~~~

After installation and configuration, the application will be available at the following URL:

~~~
http://newsblog:8080/index.php
~~~