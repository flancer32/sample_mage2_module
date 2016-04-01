# Sample module for Magento 2

Stub for Magento 2 module with development environment.

[![Build Status](https://travis-ci.org/flancer32/sample_mage2_module.svg)](https://travis-ci.org/flancer32/sample_mage2_module/)


## Magento 1 Sample Module

[flancer32/sample_mage1_module](https://github.com/flancer32/sample_mage1_module)


## Installation

### Create local configuration

    $ cp deploy_cfg.sh.init deploy_cfg.sh
    $ nano deploy_cfg.sh    //edit configuration for deployment

### Get credentials to authenticate on 'repo.magento.com'

Go to [Secure Keys](https://www.magentocommerce.com/magento-connect/customerdata/secureKeys/list/) section (_My Account / Connect / Developer / Secure Keys_) and generate pair of keys to connect to Magento 2 repository.

### Run deployment script

    $ sh deploy.sh

	Clean up application's root folder (/.../sample_mage2_module/work)...

	Create M2 CE project in '/.../sample_mage2_module/work' using 'composer install'...
		Authentication required (repo.magento.com):    // NOTE: on the first iteration only if you will save credentials.
		  Username: <Magento pub key>
		  Password: <Magento priv key>
	...
	Filter original    // NOTE: unset unnecessary nodes and merge Magento's "composer.json" with your own options.
			'/.../sample_DB_NAME_module/work/composer.json' on
			'/.../sample_DB_NAME_module/deploy/composer_unset.json' set and populate with additional options from
			'/.../sample_DB_NAME_module/deploy/composer_opts.json'...
	...
	Update M2 CE project with additional options...
	...
	Drop M2 database DB_NAME...
	Database "DB_NAME" dropped

	(Re)install Magento using database 'DB_NAME' (connecting as 'USER_NAME').
	...
	Create working folders before permissions will be set.

	Switch Magento 2 instance into 'developer' mode.
	Enabled developer mode.

	Set file system ownership (OWNER:GROUP) and permissions...

	Deployment is done.
	Go to http://.../ to check your Magento 2 instance.



## Tests

    $ cd work/vendor
    $ php ./bin/phpunit -c flancer32/sample_mage2_module/test/unit/phpunit.dist.xml
    $ php ./bin/phpunit -c flancer32/sample_mage2_module/test/functional/phpunit.dist.xml

## Travis CI

[Last log](https://travis-ci.org/flancer32/sample_mage2_module/).


## Notes

### Install Composer

This is allowed for PHP 5.6:

    $ sudo apt-get install composer

Use this method for PHP 7:

    $ curl -sS https://getcomposer.org/installer | php
    $ sudo mv composer.phar /usr/local/bin/composer

### Required PHP exts

You can see error message like this

    Your requirements could not be resolved to an installable set of packages.

      Problem 1
        - Installation request for magento/product-community-edition 2.0.2 -> satisfiable by magento/product-community-edition[2.0.2].
        - magento/product-community-edition 2.0.2 requires ext-gd * -> the requested PHP extension gd is missing from your system.

in case of not all [required PHP extensions](http://devdocs.magento.com/guides/v2.0/install-gde/system-requirements.html) are installed.

Install PHP extensions on Ubuntu:

    $ sudo apt-get install php7.0-bcmath php7.0-curl php7.0-gd php7.0-intl php7.0-mbstring php7.0-mcrypt php7.0-mysql php7.0-xml libapache2-mod-php7.0 php7.0-zip php7.0-json php7.0-opcache


## Apache2

    $ sudo apt-get install libapache2-mod-php7.0
    $ sudo a2enmod rewrite
    $ sudo service apache2 restart

Sample of the virtual host config:

    <VirtualHost *:80>
            ServerName mage2.localhost
            ServerAdmin webmaster@localhost
            DocumentRoot /.../sample_mage2_module/work
            <Directory "/.../sample_mage2_module/work/">
                    AllowOverride All
                    Require all granted
            </Directory>
            LogLevel info
            ErrorLog ${APACHE_LOG_DIR}/error.log
            CustomLog ${APACHE_LOG_DIR}/access.log combined
    </VirtualHost>

Don't forget about `AllowOverride All`, otherwise rewrite rules in `.htaccess` files will not be allowed and public resources will not be generated in the `/pub/static/[frontend|adminhtml]` folders.

## Links

* [Installing Magento 2 (Integrators)](http://devdocs.magento.com/guides/v2.0/install-gde/prereq/integrator_install.html)
* [Magento 2: PHP 5.5, 5.6, or 7.0—CentOS](http://devdocs.magento.com/guides/v2.0/install-gde/prereq/php-centos.html)
* [Magento 2: PHP 5.5, 5.6, or 7.0—Ubuntu](http://devdocs.magento.com/guides/v2.0/install-gde/prereq/php-ubuntu.html)
* [Magento authentication keys](http://devdocs.magento.com/guides/v2.0/install-gde/prereq/connect-auth.html)
* [Travis CI: Defining Variables in Repository Settings](https://docs.travis-ci.com/user/environment-variables/#Defining-Variables-in-Repository-Settings)


