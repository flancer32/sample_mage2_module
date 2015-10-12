# Create DB tables in Magento 2 sample module
 
[Magento 2 module from scratch - Part 3: Setup classes & databases](https://www.ashsmith.io/magento2/module-from-scratch-part-3-database-tables/)

_"When you first install your module and run **bin/magento setup:db-schema:upgrade** our Setup script will be ran, and
a record inserted into a table called **setup_module**, which is the same as the **core_resource** table from Magento 1.x."_

(c) Ash Smith


[Source](../src/Setup/InstallSchema.php)

To update schema run:

    $ cd work/htdocs/
    $ php bin/magento setup:db-schema:upgrade
