# M2 Sample Module's Structure

This is just a sample, you can create your own module's structure by your own way.
This is a PHP Composer compatible module to be used in Magento v2 applications.
Module contains development instance of the Magento v2 application with module's sources are (sym)linked into 
this development instance.


* [docs](../docs/): documentation root; 
* [live](../live/): production/pilot environment root;
    * [composer.json](../live/composer.json): PHP Composer descriptor for project;
     * [templates.cfg.json](../live/templates.cfg.json): configuration for templates processing 
     (source templates paths, targets paths, composer events, etc).
     * [templates.vars.json.init](../live/templates.vars.json.init): source for templates variables; 
* [src](../src/): module's sources;
    * [cfg](../src/cfg/): initial templates for templates processing;
    * [mage](../src/mage/): M2 module sources;
* [test](../test/): modules's test sources and scripts;
* [work](../work/): development environment root;
    * [composer.json](../work/composer.json): PHP Composer descriptor for project;
     * [templates.cfg.json](../work/templates.cfg.json): configuration for templates processing 
     (source templates paths, targets paths, composer events, etc).
     * [templates.vars.json.init](../work/templates.vars.json.init): source for templates variables;
     * [templates.vars.json.travis](../work/templates.vars.json.travis): template variables for Travis CI;