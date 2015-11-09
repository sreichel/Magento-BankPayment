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

class Ffuenf_BankPayment_Model_BankPayment extends Mage_Payment_Model_Method_Abstract
{
    /**
     * unique internal payment method identifier
     *
     * @var string [a-z0-9_]
     */
    protected $_code = 'bankpayment';

    protected $_formBlockType = 'bankpayment/form';
    protected $_infoBlockType = 'bankpayment/info';
    protected $_accounts;
    protected $_storeId;

    /**
     * get the correct store id
     *
     * @return int
     */
    protected function getStoreId()
    {
        $paymentInfo = $this->getInfoInstance();
        if ($currentOrder = Mage::registry('current_order')) {
            $this->_storeId = $currentOrder->getStoreId();
        } elseif ($paymentInfo instanceof Mage_Sales_Model_Order_Payment) {
            $this->_storeId = $paymentInfo->getOrder()->getStoreId();
        }
        return $this->_storeId;
    }

    /**
     * @return string|nil
     */
    public function getAccountHolder()
    {
        if ($accounts = $this->getAccounts()) {
            return $accounts[0]->getAccountHolder();
        }
        return null;
    }

    /**
     * @return string|nil
     */
    public function getBankName()
    {
        if ($accounts = $this->getAccounts()) {
            return $accounts[0]->getBankName();
        }
        return null;
    }

    /**
     * @return string|nil
     */
    public function getIBAN()
    {
        if ($accounts = $this->getAccounts()) {
            return $accounts[0]->getIBAN();
        }
        return null;
    }

    /**
     * @return string|nil
     */
    public function getBIC()
    {
        if ($accounts = $this->getAccounts()) {
            return $accounts[0]->getBIC();
        }
        return null;
    }

    /**
     * @return string|nil
     */
    public function getCurrencies()
    {
        if ($accounts = $this->getAccounts()) {
            return $accounts[0]->getCurrencies();
        }
        return null;
    }

    /**
     * @return string|nil
     */
    public function getPayWithinXDays()
    {
        $storeId = $this->getStoreId();
        return Mage::getStoreConfig('payment/bankpayment/paywithinxdays', $storeId);
    }

    /**
     * @return string
     */
    public function getCustomText($addNl2Br = true)
    {
        $storeId = $this->getStoreId();
        $customText = Mage::getStoreConfig('payment/bankpayment/customtext', $storeId);
        if ($addNl2Br) {
            $customText = nl2br($customText);
        }
        return $customText;
    }

    /**
     * @return array
     */
    public function getAccounts()
    {
        if (!$this->_accounts) {
            $storeId = $this->getStoreId();
            $accounts = unserialize(Mage::getStoreConfig('payment/bankpayment/bank_accounts', $storeId));
            $this->_accounts = array();
            $fields = is_array($accounts) ? array_keys($accounts) : null;
            if (!empty($fields)) {
                foreach ($accounts[$fields[0]] as $i => $k) {
                    if ($k) {
                        $account = new Varien_Object();
                        foreach ($fields as $field) {
                            $account->setData($field, $accounts[$field][$i]);
                        }
                        $this->_accounts[] = $account;
                    }
                }
            }
        }
        return $this->_accounts;
    }
}
