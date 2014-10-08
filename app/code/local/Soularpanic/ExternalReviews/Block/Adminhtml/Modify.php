<?php
class Soularpanic_ExternalReviews_Block_Adminhtml_Modify
//extends Mage_Adminhtml_Block_Template {}
    extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm() {

        $form = new Varien_Data_Form();
        $this->setForm($form);
        $config = Mage::getSingleton('cms/wysiwyg_config')->getConfig(array(
            'add_widgets' => false,
            'add_variables' => false,
            'add_images' => true,
            'files_browser_window_url' => $this->getUrl('adminhtml/cms_wysiwyg_images/index')
        ));
        $fieldset = $form->addFieldset('externalreviews_modify_form', array('legend' => 'poot'));

        $fieldset->addField('review[name]', 'text', array(
            'name' => 'review[name]',
            'label' => 'Reviewer Name',
            'required' => true
        ));
        $fieldset->addField('review[detail]', 'textarea', array(
            'name' => 'review[detail]',
            'label' => 'Review',
            'required' => true
        ));

        $fieldset->addField('post_content', 'editor', array(
            'name' => 'post_content',
            'label' => 'lab',
            'title' => 'lab',
            'wysiwyg' => true,
            'config' => $config
        ));

        return parent::_prepareForm();
    }

}