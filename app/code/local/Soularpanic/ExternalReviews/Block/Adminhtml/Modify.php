<?php
class Soularpanic_ExternalReviews_Block_Adminhtml_Modify
    extends Mage_Adminhtml_Block_Template {

    public function getImageControlUrl($eltName) {
        return Mage::helper('adminhtml')->getUrl('adminhtml/cms_wysiwyg_images', array("target_element_id" => $eltName));
    }

}