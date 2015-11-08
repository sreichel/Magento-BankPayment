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

class Ffuenf_BankPayment_Test_Block_BankPayment extends EcomDev_PHPUnit_Test_Case_Config
{
    /**
     * Check if the block aliases are returning the correct class names
     *
     * @test
     */
    public function testBlockAliases()
    {
        $this->assertBlockAlias(
            'bankpayment/adminhtml_system_config_form_bankaccount',
            'Ffuenf_BankPayment_Block_Adminhtml_System_Config_Form_Bankaccount'
        );
        $this->assertBlockAlias(
            'bankpayment/form',
            'Ffuenf_BankPayment_Block_Form'
        );
        $this->assertBlockAlias(
            'bankpayment/info',
            'Ffuenf_BankPayment_Block_Info'
        );
    }
}
