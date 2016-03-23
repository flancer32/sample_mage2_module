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

Go to [Secure Keys](https://www.magentocommerce.com/magento-connect/customerdata/secureKeys/list/) section and generate pair of keys to connect to Magento 2 repository.

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



### Notes

There are folders that Magento 2 creates


## Tests

    $ cd work/vendor
    $ php ./bin/phpunit -c flancer32/sample_mage2_module/test/unit/phpunit.dist.xml
    $ php ./bin/phpunit -c flancer32/sample_mage2_module/test/functional/phpunit.dist.xml

## Travis CI

[Last log](https://travis-ci.org/flancer32/sample_mage2_module/).


## Links

* [Installing Magento 2 (Integrators)](http://devdocs.magento.com/guides/v2.0/install-gde/prereq/integrator_install.html)
* [Magento authentication keys](http://devdocs.magento.com/guides/v2.0/install-gde/prereq/connect-auth.html)
* [Travis CI: Defining Variables in Repository Settings](https://docs.travis-ci.com/user/environment-variables/#Defining-Variables-in-Repository-Settings)


