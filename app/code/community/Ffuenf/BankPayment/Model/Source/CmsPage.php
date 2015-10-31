<?php
/**
 * Ffuenf_BankPayment extension.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @category   Ffuenf
 *
 * @author     Achim Rosenhagen <a.rosenhagen@ffuenf.de>
 * @copyright  Copyright (c) 2015 ffuenf (http://www.ffuenf.de)
 * @license    http://opensource.org/licenses/mit-license.php MIT License
 */

class Ffuenf_BankPayment_Model_Source_CmsPage extends Mage_Adminhtml_Model_System_Config_Source_Cms_Page
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        if (!$this->_options) {
            parent::toOptionArray();
            array_unshift($this->_options, array(
                'value' => '',
                'label' => Mage::helper('core')->__('-- Please Select --'))
            );
        }
        return $this->_options;
    }
}