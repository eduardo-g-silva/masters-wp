![WP, WP-Cli, Composer, Foundation, Sass and Grunt ](hero.png)

# WordPress Starting base template
This is the repository integrating some other repos about adding composer to wp and integrating foundation to a wp theme with the idea of simplify the starting process.
Later on you can select the wp plugins you want to have changing the composer.json file but this are the plugins we are using:


##You can see a demo at:
http://wp-brixton.oe-lab.tk/


##We are using the following repos with the real hard work:
for composer install
https://github.com/roots/bedrock
that uses:
https://github.com/johnpbloch/wordpress-core-installer
to use plugins as vendors
and
https://github.com/vlucas/phpdotenv
to have the beautiful .env configuration


##for the foundation theme that we call oe-brixton, the amazing work of Ole Fredrik Lie.
we are using the code instead of forking to have our own configuration but I will recommend to take the latest version from the Ole's repo.
https://github.com/olefredrik/foundationpress

##for the bootstrap theme that we call oe-kennington, the amazing work of Per Thykjaer Jensen.
we are using the code instead of forking to have our own implementation but I will recomment to clone the lates version from this repo.
https://github.com/asathoor/maat-or-the-improved-bootstrap


##You can see some in progress documentation once you finish with the installation
https://github.com/open-ecommerce/masters-wp/blob/master/docs/working-on-it.md


#How to install and eventualy deploy :)

## Installation

1. Create a new project in a new folder for your project:

  `composer create-project open-ecommerce/masters-wp your-project-folder-name`

2. Copy `.env.example` to `.env` and update environment variables:
  * `DB_NAME` - Database name
  * `DB_USER` - Database user
  * `DB_PASSWORD` - Database password
  * `DB_HOST` - Database host
  * `WP_ENV` - Set to environment (`development`, `staging`, `production`)
  * `WP_HOME` - Full URL to WordPress home (http://example.com)
  * `WP_SITEURL` - Full URL to WordPress including subdirectory (http://example.com/wp)
  * `AUTH_KEY`, `SECURE_AUTH_KEY`, `LOGGED_IN_KEY`, `NONCE_KEY`, `AUTH_SALT`, `SECURE_AUTH_SALT`, `LOGGED_IN_SALT`, `NONCE_SALT`

  If you want to automatically generate the security keys (assuming you have wp-cli installed locally) you can use the very handy [wp-cli-dotenv-command][wp-cli-dotenv]:

      wp package install aaemnnosttv/wp-cli-dotenv-command

      wp dotenv salts regenerate

  Or, you can cut and paste from the [Roots WordPress Salt Generator][roots-wp-salt].

3. Create local DB with your tool of preference I like wp-cli so I will just run the wp command that will use what ever db credentials we put in the .env file
`wp db create`

4. Add theme(s) in `web/app/themes` as you would for a normal WordPress site.

5. Set your site vhost document root to `/path/to/example/web/` (`/path/to/example/current/web/` if using deploys)

* [more info about webserver config](https://github.com/open-ecommerce/masters-wp/blob/master/docs/how-to-vhosts.md)

6. Access WP admin at `http://example.com/wp/wp-admin`

## Deploys
There are two methods to deploy Bedrock sites out of the box:

* [Trellis](https://github.com/roots/trellis)
* [bedrock-capistrano](https://github.com/roots/bedrock-capistrano)

Any other deployment method can be used as well with one requirement:

`composer install` must be run as part of the deploy process.

## Documentation
Bedrock documentation is available at [https://roots.io/bedrock/docs/](https://roots.io/bedrock/docs/).

## Now you need to choose the theme you want to use we put 2 themes in this repo:

###oe-brixton based in foundation 4
As I said it is forked from Fredrik repo: https://github.com/olefredrik/foundationpress

This is a starter-theme for WordPress based on Foundation 6, the most advanced responsive (mobile-first) framework in the world. The purpose of FoundationPress, is to act as a small and handy toolbox that contains the essentials needed to build any design. FoundationPress is meant to be a starting point, not the final product.

[more info about oe-brixton documentation](https://github.com/open-ecommerce/masters-wp/blob/master/docs/how-to-oe-brixton.md)


###oe-kennington based in bootstrap 4  
This theme it is a fork of [Maat theme repo](https://raw.githubusercontent.com/asathoor/maat-or-the-improved-bootstrap) and customized for our own needs.

[more info about oe-kennington documentation](https://github.com/open-ecommerce/masters-wp/blob/master/docs/how-to-oe-kennington.md)



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
