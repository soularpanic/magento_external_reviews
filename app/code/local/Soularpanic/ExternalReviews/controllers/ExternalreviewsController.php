<?php
class Soularpanic_ExternalReviews_ExternalreviewsController
    extends Mage_Adminhtml_Controller_Action {

    public function indexAction() {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function modifyAction() {
        $this->loadLayout();
        $form = $this->getLayout()->getBlock('form');
        $review = Mage::getModel('externalreviews/review');

        $reviewId = $this->getRequest()->getParam('review_id');
        if ($reviewId) {
            $review->load($reviewId);
        }

        $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

        $form->setReview($review);
        $this->renderLayout();
    }

    public function saveAction() {
        $data = $this->getRequest()->getParam('review');
        $id = $data['id'];
        $review = Mage::getModel('externalreviews/review');
        if ($id) {
            unset($data['id']);
            $review->load($id);
        }

        $review->setData($data);

        if ($id) {
            $review->setId($id);
        }

        $review->save();

        $this->_redirect('*/*/index');
    }

    public function deleteAction() {

    }

}