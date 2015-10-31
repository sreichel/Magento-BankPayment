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

class Ffuenf_BankPayment_Block_Info extends Mage_Payment_Block_Info
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('bankpayment/info.phtml');
    }

    public function toPdf()
    {
        $this->setTemplate('bankpayment/pdf/info.phtml');
        return $this->toHtml();
    }

    public function getAccounts() {
        return $this->getMethod()->getAccounts();
    }

    public function getShowBankAccountsInPdf() {
        return $this->getMethod()->getConfigData('show_bank_accounts_in_pdf');
    }

    public function getShowCustomTextInPdf() {
        return $this->getMethod()->getConfigData('show_customtext_in_pdf');
    }
}
