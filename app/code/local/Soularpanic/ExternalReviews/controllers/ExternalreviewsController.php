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
            $review->load($id);
        }

        $review->setNickname($data['nickname']);
        $review->setDetail($data['detail']);

        foreach (array('source_banner_url', 'source_image_url', 'source_icon_url') as $imageKey) {
            $review->setData($imageKey, $this->_publicizeCmsUrl($data[$imageKey]));
        }

        $review->save();

        $this->_redirect('*/*/index');
    }

    public function deleteAction() {
        $reviewId = $this->getRequest()->getParam('review_id');
        if ($reviewId) {
            Mage::getModel('externalreviews/review')->load($reviewId)->delete();
        }
        $this->_redirect('*/*/index');
    }

    const ADMIN_PATTERN = '/___directive\/([^\/]+)\//';
    const MEDIA_TAG_PATTERN = '/ url="([^"]+)"/';

    protected function _publicizeCmsUrl($url) {
        $matches = array();
        $match = preg_match(self::ADMIN_PATTERN, $url, $matches);
        if ($match === 1) {
            $directive = $matches[1];
            $mediaStr = base64_decode($directive);
            $mediaMatches = array();
            $mediaMatch = preg_match(self::MEDIA_TAG_PATTERN, $mediaStr, $mediaMatches);
            if ($mediaMatch === 1) {
                $mediaPath = $mediaMatches[1];
                return Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).$mediaPath;
            }
        }
        return $url;
    }

}