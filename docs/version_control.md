# Version control for Magento v2 module



## Mapping

Module's files and folders mapping is configured in module's [composer.json](../composer.json):

      "extra": {
        "map": [
          [
            "src",
            "Flancer32/Sample"
          ]
        ]
      },

 
## Symlinks

Files and folders from `work/vendor/flancer32/sample_mage2_module` are mapped into the `work/htdocs` folder using
*symlink* strategy. So when you change file `work/htdocs/app/code/Flancer32/Sample/etc/module.xml`
you really change file `work/vendor/flancer32/sample_mage2_module/src/etc/module.xml`.

You should use local git repository in `work/vendor/flancer32/sample_mage2_module` to work with changes in the module.

 
[Configure](https://github.com/flancer32/sample_mage2_module/blob/master/work/composer.json) deploy strategy for 
modules in development:

      "extra": {
        "magento-deploystrategy": "copy",
        "magento-deploystrategy-overwrite": {
          "flancer32/sample_magelib_demo": "symlink",
          "flancer32/sample_mage2_module": "symlink"
        }
      }
 
 
## Add git repositories to your IDE

You should add repositories for all your modules to your IDE including the root repo (this repo). 
This is sample for PHPStorm IDE:

![vc_ide_settings][vc_ide_settings]





## Repo conflicts

De facto you have a 2 local repositories:
* ./.git
* ./work/vendor/flancer32/sample_mage2_module/.git

that match to one remote repository https://github.com/flancer32/sample_mage2_module/

You will have a lot of _"Merge remote-tracking branch 'origin/master'"_ messages if you will change sources in both
 repositories simultaneously.

![vc_repo_conflicts][vc_repo_conflicts]
   
   
   
[vc_ide_settings]: ./img/phpstorm_vs_setup.png
[vc_repo_conflicts]: ./img/vc2_repo_conflicts.png