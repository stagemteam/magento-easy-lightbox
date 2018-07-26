<?php

class TM_EasyLightbox_Block_Image extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{
    protected function _toHtml()
    {
        $path = $this->getData('path');
        if (empty($path)) {
            return '';
        }
        return parent::_toHtml();
    }
}
