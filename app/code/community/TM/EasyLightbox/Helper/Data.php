<?php

class TM_EasyLightbox_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function isEnabled()
    {
        return $this->isModuleOutputEnabled('TM_EasyLightbox')
            && Mage::getStoreConfigFlag('tm_easylightbox/general/enabled');
    }
}
