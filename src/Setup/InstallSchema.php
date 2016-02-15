<?php
/**
 * Create DB schema for sample module.
 *
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace Flancer32\Sample\Setup;

use Flancer32\Sample\Entity\Account;
use Magento\Framework\DB\Ddl\Table as Ddl;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface {

    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();
        $optId = [ 'identity' => true, 'primary' => true, 'nullable' => false, 'unsigned' => true ];

        $conn = $installer->getConnection();
        $tbl = $installer->getTable(Account::ENTITY_NAME);

        /** ********************************
         * Table for Entity
         ******************************** */
        $tbl = $conn->newTable($tbl);
        $tbl->addColumn(Account::ATTR_ID, Ddl::TYPE_INTEGER, null, $optId,
            'Instance ID.');
        $tbl->addColumn(Account::ATTR_CUST_ID, Ddl::TYPE_INTEGER, null, [ 'nullable' => false ],
            'Customer ID.');
        $tbl->addColumn(Account::ATTR_ASSET_TYPE_ID, Ddl::TYPE_INTEGER, null, [ 'nullable' => false ],
            'Asset type ID.');
        $tbl->addColumn(Account::ATTR_BALANCE, Ddl::TYPE_DECIMAL, '12,4', [ 'nullable' => false ],
            'Balance value.');
        $tbl->setComment('Customer balance for the asset.');
        $conn->createTable($tbl);

        $installer->endSetup();
    }

}