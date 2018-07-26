<?php

class TM_EasyLightbox_Block_Adminhtml_System_Config_Form_Field_ImageSize
    extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $element->setStyle('width:70px;')
            ->setName($element->getName() . '[]');

        if ($element->getValue()) {
            $values = explode(',', $element->getValue());
        } else {
            $values = array();
        }

        $left = $element->setValue(isset($values[0]) ? $values[0] : null)->getElementHtml();
        $top  = $element->setValue(isset($values[1]) ? $values[1] : null)->getElementHtml();
        return Mage::helper('sales')->__('Width') . ' ' . $left
            . ' '
            . Mage::helper('sales')->__('Height') . ' ' . $top;
    }
}
