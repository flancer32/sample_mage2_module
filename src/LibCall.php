<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */
namespace Flancer32\Sample;

use Flancer32\Lib\Entity\Bonus\Type as BonusType;

class LibCall {

    public function doCall() {
        /** @var  $lib Flancer32\Lib\Service\Customer\Call */
        $lib = new \Flancer32\Lib\Service\Customer\Call();
        $result = $lib->operation(32);
        return $result;
    }

    /**
     * Perform low-level DB operations using common library.
     *
     * @return string
     */
    public function doDbOperations() {
        $result = false;
        /** @var  $call \Flancer32\Lib\Service\Customer\Call */
        $call = new \Flancer32\Lib\Service\Customer\Call();
        $typeValue = 'personal';
        $typeNote = 'Personal Bonus';
        $typeNoteNew = 'Personal Bonus New';
        /* insert one record */
        $cols = array(
            BonusType::ATTR_VALUE => $typeValue,
            BonusType::ATTR_NOTE  => $typeNote
        );
        $id = $call->dbInsert($cols);
        /* select one record by id */
        $record = $call->dbSelect($id);
        if($record[ BonusType::ATTR_VALUE ] == $typeValue) {
            /* update one record */
            $updated = $call->dbUpdate($id, array( BonusType::ATTR_NOTE => $typeNoteNew ));
            if($updated > 0) {
                /* delete one record */
                $deleted = $call->dbDelete($id);
                if($deleted) {
                    $result = true;
                }
            }
        }
        return $result;
    }
}