# Magento 2 command-line usage 

    .../sample_mage2_module/work/htdocs/bin$ php magento --help
    Usage:
     help [--xml] [--format="..."] [--raw] [command_name]
    
    Arguments:
     command               The command to execute
     command_name          The command name (default: "help")
    
    Options:
     --xml                 To output help as XML
     --format              To output help in other formats (default: "txt")
     --raw                 To output raw command help
     --help (-h)           Display this help message
     --quiet (-q)          Do not output any message
     --verbose (-v|vv|vvv) Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
     --version (-V)        Display this application version
     --ansi                Force ANSI output
     --no-ansi             Disable ANSI output
     --no-interaction (-n) Do not ask any interactive question
    
    Help:
     The help command displays help for a given command:
     
       php magento help list
     
     You can also output the help in other formats by using the --format option:
     
       php magento help --format=xml list
     
     To display the list of available commands, please use the list command.

[List](http://devdocs.magento.com/guides/v2.0/install-gde/install/cli/install-cli-install.html#instgde-install-cli-magento)
of the `setup:install` options.