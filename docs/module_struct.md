# Magento v2 module structure

This is just a sample, you can create your own module's structure by your own way.
This is a PHP Composer compatible module to be used in Magento v2 applications.
There is development instance of the Magento application with our module (sym)linked into the application.



## Module itself related files and folders



### ./composer.json

[Source](../composer.json)

Main file of the composer package. Defines type of the package (magento-module), dependencies and files mapping to the
target Magento application.



### ./src

Module's sources to be used for mapping when composer package will be installed.
These are not sources for development, these sources are for deployment only.



## Development environment



### ./work

Contains files to deploy development environment for module development.



### ./work/composer.json

[Source](../work/composer.json)

Descriptor for Magento application deployment. This app will include our module and will provide environment 
for module's development.



### ./work/cfg/bin/deploy/post_install.sh

[Source](../work/cfg/bin/deploy/post_install.sh)

Template to compose shell script to create Magento DB, run Magento installer to populate DB with tables
and perform other post installation setup.
 
 
 
### ./work/cfg/bin/deploy/post_install.sql

[Source](../work/cfg/bin/deploy/post_install.sql)
 
Template to compose SQL script with custom configuration to be applied after the Magento DB will be installed.
 
 
 
### ./work/cfg/templates.json

[Source](../work/cfg/templates.json)
 
Configuration for templates processing (source templates paths, targets paths, composer events, etc).
 

 
 
 
### ./work/templates.json.init

[Source](../work/templates.json.init)
 
Stub for templates placeholders values.
 


## Documentation



### ./docs

Documentation folder (Markdown files and images).



## Deployed development environment



### ./work/htdocs

Root folder for development Magento application. You should point your web-server to this location.
Source code of the development instance of the module will be linked into this applicaiton. 



### ./work/vendor

Composer's packages, including development version of the module (`./work/vendor/flancer32/sample_mage2_module`).