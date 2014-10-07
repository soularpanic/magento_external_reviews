<?php
class Soularpanic_ExternalReviews_Model_Resource_ExternalReview
    extends Mage_Core_Model_Resource_Db_Abstract {

    protected function _construct() {
        $this->_init('externalreviews/ExternalReview', 'entity_id');
    }

}