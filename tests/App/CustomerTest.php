<?php

namespace App;

use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    public function testCustomerObject(): void
    {
        $idAdmin = null;
        $firstNameAdmin = 'FirstAdmin';
        $lastNameAdmin = 'LastAdmin';
        $ageAdmin = 25;
        $isBan = true;
        $isAdmin = false;

        $admin = new Admin($idAdmin, $firstNameAdmin, $lastNameAdmin, $ageAdmin, $isBan, $isAdmin);

        $idCustomer = 99;
        $firstNameCustomer = 'FirstNameCustomer';
        $lastNameCustomer = 'LastNameCustomer';
        $ageCustomer = 50;
        $isBanCustomer = false;

        $customer = new Customer($idCustomer, $firstNameCustomer, $lastNameCustomer, $ageCustomer, $isBanCustomer);
        $this->assertEquals(99, $customer->getId());
        $this->assertEquals('FirstNameCustomer', $customer->getFirstName());
        $this->assertEquals('LastNameCustomer', $customer->getLastName());
        $this->assertEquals(50, $customer->getAge());
        $this->assertEquals(false, $customer->getIsBan());

        $customer->setId($admin);
        $customer->setFirstName($admin);
        $customer->setLastName($admin);
        $customer->setAge($admin);
        $customer->setIsBan($admin);

        $this->assertEquals(null, $customer->getId());
        $this->assertEquals('FirstAdmin', $customer->getFirstName());
        $this->assertEquals('LastAdmin', $customer->getLastName());
        $this->assertEquals(25, $customer->getAge());
        $this->assertEquals(true, $customer->getIsBan());
    }
}