# Deployment

## Overview

There are 4 types of the deployment:

* [Development environment](./work.md)
* [Test environment](./travis.md) (Travis CI)
* [Pilot environment](./pilot.md) - the same as live environment but with additional scripts to clone DB/media from real 
live instance;
* [Live/production environment](./live.md)

Magento 2 application is installed into `./work/` (development and test instances) or `./live/` (pilot and production 
instances) folder, where project's `composer.json` is placed. 
No [other](https://github.com/magento/magento2/issues/2433) folder is possible at the current moment.


Each folder (`./work/` and `./live/`) contains its own `./composer.json` for Magento 2 application (
[work](../../work/composer.json), [live](../../live/composer.json)). 

Type of the deployment is set in the configuration file [templates.vars.json](./templates.vars.json.init):

    {
      "vars": {
        "DEPLOYMENT_TYPE": "live|pilot|test|development"
      }
    }



## Common steps


### Configuration data

All instance related configuration is placed in JSON file in the root of the sample. Each pair (development/test 
instances from `./work/` and pilot/production instances from `./live/`) has it's own configuration file:

* ./templates.vars.work.json
* ./templates.vars.live.json

There is [template](../../templates.vars.json.init) to create configuration files.



### Install composer app

    $ cd ./work/
    $ composer install



### Setup