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

class Ffuenf_BankPayment_Model_Source_Order_Status extends Mage_Adminhtml_Model_System_Config_Source_Order_Status
{
    public function __construct()
    {
        if (version_compare(Mage::getVersion(), '1.4.0', '>=')) {
            $this->_stateStatuses[] = Mage_Sales_Model_Order::STATE_PENDING_PAYMENT;
        }
        return $this;
    }

}