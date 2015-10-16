# Magento 2 CLI

List of the available commands for `./[work|live]/htdocs/bin/magento`:

    .../work$ php ./htdocs/bin/magento list
    Magento CLI version 1.0.0-beta
    
    Usage:
     command [options] [arguments]
    
    Options:
     --help (-h)           Display this help message
     --quiet (-q)          Do not output any message
     --verbose (-v|vv|vvv) Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
     --version (-V)        Display this application version
     --ansi                Force ANSI output
     --no-ansi             Disable ANSI output
     --no-interaction (-n) Do not ask any interactive question
    
    Available commands:
     help                                      Displays help for a command
     list                                      Lists commands
    admin
     admin:user:create                         Creates an administrator
    cache
     cache:clean                               Cleans cache type(s)
     cache:disable                             Disables cache type(s)
     cache:enable                              Enables cache type(s)
     cache:flush                               Flushes cache storage used by cache type(s)
     cache:status                              Checks cache status
    cron
     cron:run                                  Runs jobs by schedule
    dev
     dev:css:deploy                            Collects, processes and publishes source LESS files
     dev:tests:run                             Runs tests
     dev:xml:convert                           Converts XML file using XSL style sheets
    i18n
     i18n:collect-phrases                      Discovers phrases in the codebase
     i18n:pack                                 Saves language package
     i18n:uninstall                            Uninstalls language packages
    indexer
     indexer:info                              Shows allowed Indexers
     indexer:reindex                           Reindexes Data
     indexer:set-mode                          Sets index mode type
     indexer:show-mode                         Shows Index Mode
     indexer:status                            Shows status of Indexer
    info
     info:backups:list                         Prints list of available backup files
     info:currency:list                        Displays the list of available currencies
     info:dependencies:show-framework          Shows number of dependencies on Magento framework
     info:dependencies:show-modules            Shows number of dependencies between modules
     info:dependencies:show-modules-circular   Shows number of circular dependencies between modules
     info:language:list                        Displays the list of available language locales
     info:timezone:list                        Displays the list of available timezones
    log
     log:clean                                 Cleans Logs
     log:status                                Displays statistics per log tables
    maintenance
     maintenance:allow-ips                     Sets maintenance mode exempt IPs
     maintenance:disable                       Disables maintenance mode
     maintenance:enable                        Enables maintenance mode
     maintenance:status                        Displays maintenance mode status
    module
     module:disable                            Disables specified modules
     module:enable                             Enables specified modules
     module:status                             Displays status of modules
     module:uninstall                          Uninstalls modules installed by composer
    setup
     setup:backup                              Takes backup of Magento Application code base, media and database
     setup:config:set                          Creates or modifies the deployment configuration
     setup:db-data:upgrade                     Installs and upgrades data in the DB
     setup:db-schema:upgrade                   Installs and upgrades the DB schema
     setup:db:status                           Checks if DB schema or data requires upgrade
     setup:di:compile                          Generates DI configuration and all non-existing interceptors and factories
     setup:di:compile-multi-tenant             Generates all non-existing proxies and factories, and pre-compile class definitions, inheritance information and plugin definitions
     setup:install                             Installs the Magento application
     setup:performance:generate-fixtures       Generates fixtures
     setup:rollback                            Rolls back Magento Application codebase, media and database
     setup:static-content:deploy               Deploys static view files
     setup:store-config:set                    Installs the store configuration
     setup:uninstall                           Uninstalls the Magento application
     setup:upgrade                             Upgrades the Magento application, DB data, and schema
    theme
     theme:uninstall                           Uninstalls theme
