# sample_mage2_module

Stub for Magento 2 module with development environment



## Magento 2 Module Links

* [Installing Magento 2 with Composer](http://magenticians.com/installing-magento-2-composer)
* [Setup Wizard installation](9http://devdocs.magento.com/guides/v2.0/install-gde/install/web/install-web.html)



## Development Installation

Clone repo from github:

    $ git clone git@github.com:flancer32/sample_mage2_module.git
    $ cd sample_mage2_module/work/

... configure development instance (DB parameters, access parametes, etc):

    $ cp templates.json.init templates.json
    $ nano templates.json    
    {
      "vars": {
        "LOCAL_ROOT": "/home/alex/work/github/sample_mage2_module",
        "CFG_ADMIN_FIRSTNAME": "Store",
        "CFG_ADMIN_LASTNAME": "Admin",
        "CFG_ADMIN_EMAIL": "admin@store.com",
        "CFG_ADMIN_USERNAME": "admin",
        "CFG_ADMIN_PASSWORD": "5ld5nmseE0FfVNQG1vSX",
        "CFG_BASE_URL": "http://mage2.local.prxgt.com:50080/",
        "CFG_BACKEND_FRONTNAME": "admin",
        "CFG_DB_HOST": "localhost",
        "CFG_DB_NAME": "mage2",
        "CFG_DB_USER": "apache",
        "CFG_DB_PASSWORD": "JplOM6LeHPNa6fHQl5MP9",
        "CFG_LANGUAGE": "en_US",
        "CFG_CURRENCY": "USD",
        "CFG_TIMEZONE": "UTC",
        "CFG_USE_REWRITES": "0",
        "CFG_USE_SECURE": "0",
        "CFG_USE_SECURE_ADMIN": "0",
        "CFG_ADMI_USE_SECURITY_KEY": "0",
        "CFG_SESSION_SAVE": "db"
      }
    }
    
... then run composer and Magento install:  
    
    $ composer install
    $ sh  ./bin/deploy/post_install.sh



## Setup web server

Point your web-server to folder `$LOCAL_ROOT/work/htdocs`


    
## Module's Source Linking

Module sources are in `./work/vendor/flancer32/sample_mage2_module/src`:  

![Symlink target mount point][symlink_to]

... but mounted into Magento 2 application structure using symlinks: 

![Symlink source mount point][symlink_from]

You should change files in `./work/htdocs/app/code/Flancer32` folder
 (linked to `./work/vendor/flancer32/sample_mage2_module/src`), not in `./src` folder itself. 

Commit changes from `./work/vendor/flancer32/sample_mage2_module/src` to git:

![Commit from vendor to git repo][git_commit]



[symlink_from]: ./docs/img/symlink_from.png
[symlink_to]: ./docs/img/symlink_to.png
[git_commit]: ./docs/img/git_commit.png