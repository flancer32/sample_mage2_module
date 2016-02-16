# Sample module for Magento 2

Stub for Magento 2 module with development environment.

[![Build Status](https://travis-ci.org/flancer32/sample_mage2_module.svg)](https://travis-ci.org/flancer32/sample_mage2_module/)


## Magento 1 Sample Module

[flancer32/sample_mage1_module](https://github.com/flancer32/sample_mage1_module)


## Installation

    $ cp deploy_cfg.sh.init deploy_cfg.sh
    $ nano deploy_cfg.sh    //edit configuration for deployment
    $ sh deploy.sh


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


