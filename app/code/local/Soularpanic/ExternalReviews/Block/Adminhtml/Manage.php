<?php
class Soularpanic_ExternalReviews_Block_Adminhtml_Manage
    extends Mage_Adminhtml_Block_Template {

    public function getReviews() {
        $reviews = Mage::getModel('externalreviews/review')->getCollection()->load();
        return $reviews;
    }

}