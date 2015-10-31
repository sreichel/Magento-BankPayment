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

class Ffuenf_BankPayment_Block_Form extends Mage_Payment_Block_Form
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('bankpayment/form.phtml');
    }

    public function getCustomFormBlockType()
    {
        return $this->getMethod()->getConfigData('form_block_type');
    }

    public function getFormCmsUrl()
    {
        $pageUrl = null;
        $pageCode = $this->getMethod()->getConfigData('form_cms_page');
        if (!empty($pageCode)) {
            if ($pageId = Mage::getModel('cms/page')->checkIdentifier($pageCode, Mage::app()->getStore()->getId())) {
                $pageUrl = Mage::helper('cms/page')->getPageUrl($pageId);
            }
        }
        return $pageUrl;
    }

    public function getAccounts()
    {
        return $this->getMethod()->getAccounts();
    }

    public function getCustomText($addNl2Br = true)
    {
        return $this->getMethod()->getCustomText($addNl2Br);
    }
}
