<?php
/**
 * Copyright (c) 2015, Praxigento
 * All rights reserved.
 */

/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace Flancer32\Sample\Setup;

use Flancer32\Lib\Entity\Bonus\Type as BonusType;
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
        $optId = array( 'identity' => true, 'primary' => true, 'nullable' => false, 'unsigned' => true );

        $conn = $installer->getConnection();
        $tblBonusType = $installer->getTable(BonusType::NAME);

        /** ********************************
         * Table for BonusType entity
         ******************************** */
        $tbl = $conn->newTable($tblBonusType);
        $tbl->addColumn(BonusType::ATTR_ID, Ddl::TYPE_INTEGER, null, $optId,
            'Instance ID.');
        $tbl->addColumn(BonusType::ATTR_VALUE, Ddl::TYPE_TEXT, 255, array( 'nullable' => false ),
            'Value for the bonus type.');
        $tbl->addColumn(BonusType::ATTR_NOTE, Ddl::TYPE_TEXT, 255, array( 'nullable' => false ),
            'Description of the type');
        $tbl->setComment('Types of the available bonuses.');
        $conn->createTable($tbl);

        $installer->endSetup();
    }

}