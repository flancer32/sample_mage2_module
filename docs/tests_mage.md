# Test Magento 2 itself

[Run tests](http://devdocs.magento.com/guides/v2.0/config-guide/cli/config-cli-subcommands-test.html)

    $ php ./bin/magento module:enable Magento_Developer
    $ php ./bin/magento dev:tests:run unit
    
    
    $ php ./bin/magento dev:tests:run --help
    Usage:
     dev:tests:run [type]
    
    Arguments:
     type                  Type of test to run. Available types: all, unit, integration, integration-all, static, static-all, integrity, legacy, default (default: "default")
    
    Options:
     --help (-h)           Display this help message
     --quiet (-q)          Do not output any message
     --verbose (-v|vv|vvv) Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
     --version (-V)        Display this application version
     --ansi                Force ANSI output
     --no-ansi             Disable ANSI output
     --no-interaction (-n) Do not ask any interactive question
