<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */
namespace Flancer32\Sample\Entity;

class Account {
    /* attributes (table's columns) */
    const ATTR_ASSET_TYPE_ID = 'asset_type_id';
    const ATTR_BALANCE = 'balance';
    const ATTR_CUST_ID = 'customer_id';
    const ATTR_ID = 'id';
    /* this is table name inf DB (w/o prefix) */
    const ENTITY_NAME = 'fl32_sample_account';
}