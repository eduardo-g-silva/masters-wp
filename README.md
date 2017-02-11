![WP, WP-Cli, Composer, Foundation, Sass and Grunt ](hero.png)

# WordPress Starting base template
This is the repository integrating some other repos about adding composer to wp and integrating foundation to a wp theme with the idea of simplify the starting process.
Later on you can select the wp plugins you want to have changing the composer.json file but this are the plugins we are using:

- "wpackagist-plugin/captcha":"4.1.8",
- "wpackagist-plugin/wordpress-importer": "0.6.1",
- "wpackagist-plugin/wordpress-seo":"*",
- "wpackagist-plugin/vimeography": "1.3.1",
- "wpackagist-plugin/siteorigin-panels": "dev-trunk",
- "wpackagist-plugin/so-widgets-bundle": "1.5.11",
- "wpackagist-plugin/w3-total-cache": "0.9.4.1",
- "wpackagist-plugin/client-dash": "1.6.8"


## Deploying to Heroku
[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)

##You can see a demo at:
http://wp-brixton.oe-lab.tk/


##We are using the following repos with the real hard work:
for composer install
https://github.com/johnpbloch/wordpress-core-installer

for the foundation theme, the amazing work of Ole Fredrik Lie.
we are using the code instead of forking to have our own configuration but I will recommend to take the latest version from the Ole's repo.
https://github.com/olefredrik/foundationpress


##You can see some in progress documentation once you finish with the installation
https://github.com/open-ecommerce/masters-wp/blob/master/docs/working-on-it.md


#How to install and eventualy deploy :)


## Prerequisites
You will need WP-CLI installed in your box with a lamp (mysql, apache, php etc)

Installing cli in your system:
```
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
```
other options
```
php -r "readfile('https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar');" > wp-cli.phar
```

If you can't run curl in your shared server just download wp-cli.phar and upload the file using ftp

Then, you need to make the file executable:
```
chmod +x wp-cli.phar
```

The final step is to move the file to a folder, so that you can execute it from anywhere. Renaming the file to something easy to remember and type is also a good idea; this is the reason why wp is the most commonly used name:
```
sudo mv wp-cli.phar /usr/local/bin/wp
wp --info
```

## Instructions to make the wordpress work in your dev box
### clone the master branch of this repo
```
git clone https://github.com/open-ecommerce/masters-wp.git
```
(or to the ssh address if you have a sshkey)

### navigate to the htdocs forder inside master-wp
```
cd masters-wp/htdocs
```

### get latest version of wp for your locale
(choose your locale from this site: http://wpcentral.io/internationalization/)
```
wp core download --locale=en_GB
```

### install wp for your db credentials
(change 'mynewwpdb' with the name of db you want create in the mysql server and your own credentials)
```
wp core config --dbname=mynewwpdb --dbuser=root --dbpass=123 --dbhost=localhost --dbprefix=oe34_
```

### create the db based in the just created wp-config (only if you haven't created the db manualy)
```
wp db create
```

### install and configure wp
- change 'myurl.dev' with the url you want to use localy.
- title is just the title inside the wp config
- change the wp admin credentials
- check more options at WP-CLI documentation: http://wp-cli.org/commands/core/install/
```
wp core install --url=myurl.dev  --title="Open-ecommerce wp master" --admin_user=oeadmin --admin_password=Password123
--admin_email="info@open-ecommerce.org"
```

### install the plugins via composer
- you can edit the composer.json file to add the pugins you want to install
- the wp plugins can be find at: http://wpackagist.org/
```
composer install
```
We added: "config": { "secure-http": false } in the composer.json, to avoid problems getting http repositories in some shared servers.

### activate all plugins using wp-cli
- you can go now to the admin and activate the wordprss you want or you can activate all the just composer installed plugins with this wp-cli command
```
wp plugin activate --all
```

### install test unit demo data
- we are using the wptest repo of Michael Novotny that it is very cool to test themes.
- check more options at WP-CLI documentation: https://github.com/manovotny/wptest

you can pull the latest version from the repo with curl:
```
curl -OL https://raw.githubusercontent.com/manovotny/wptest/master/wptest.xml
```
or with php readfile:
```
php -r "readfile('https://raw.githubusercontent.com/manovotny/wptest/master/wptest.xml');" > wptest.xml
```
I added also our version of the wptest call oe-dumy-sample into this repo just go to to the wp folder and import all with wp
```
wp import wptest.xml --authors=create
```
or
```
wp import oe-dummy-sample.xml --authors=create
```

and then delete the file
```
rm wptest.xml
```


### add the domain to your dev box
- if you are in ubuntu you can use the file manager to do that: `sudo nautilus`
- copy the /docs/myurl.dev.conf to etc/apache2/sites-available and change the domain
- `sudo a2ensite myurl.dev.conf`
- add the domain to your /etc/hosts file

### at this point you should be having a wp installed and configured
- navigate to the myurl.dev/wp-login
- user: oeadmin
- pass: Password123

### next step is to build the wp foundation theme you can check the full doc in the foundationPress repo but a quick reminder
- navigate into the themes folder /wp-content/themes/oewp
- run `npm install` (will install all the grunt modules)
- run 'grunt' to watch the theme folder and compile all grunt tasks when you change the sass files


### While you're working on your project, run:

```bash
$ npm run watch
```


### 3. For building all the assets, run:

```bash
$ npm run build
```

### Build all assets minified and without sourcemaps:
```bash
$ npm run production
```




### about .htaccess files
- we are using this htaccess boilerplate from Bob Elison's gist at: https://gist.github.com/wycks/3011895
- you will need to tweak it depending on the modules you have installed in your server (if you using apache at all...)
