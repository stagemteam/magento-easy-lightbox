<?php

class TM_EasyLightbox_Model_Observer
{
    public function applyLayoutHadles($observer)
    {
        if (!Mage::helper('easylightbox')->isEnabled()
            || Mage::getStoreConfigFlag('tm_easylightbox/general/keep_magento_zoom')) {

            return;
        }

        $layout = $observer->getLayout();
        if (!$layout || !$observer->getAction()) {
            return;
        }

        $supportedHandles = array(
            'catalog_product_view',
            'review_product_list',
        );
        $handles = $layout->getUpdate()->getHandles();
        if (!array_intersect($supportedHandles, $handles)) {
            return;
        }

        $layout->getUpdate()->addHandle('easylightbox_replace_image');
    }
}
