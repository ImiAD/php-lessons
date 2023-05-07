<?php

namespace App;

use PHPUnit\Framework\TestCase;

class AdminTest extends TestCase
{
    public function testObjectAdmin(): void
    {
        $idAdmin = null;
        $firstNameAdmin = 'FirstAdmin';
        $lastNameAdmin = 'LastAdmin';
        $ageAdmin = 25;
        $isBan = false;
        $isAdmin = true;

        $admin = new Admin($idAdmin, $firstNameAdmin, $lastNameAdmin, $ageAdmin, $isBan, $isAdmin);
        $this->assertEquals(null, $admin->getId());
        $this->assertEquals('FirstAdmin', $admin->getFirstName());
        $this->assertEquals('LastAdmin', $admin->getLastName());
        $this->assertEquals(25, $admin->getAge());
        $this->assertEquals(false, $admin->getIsBan());
        $this->assertEquals(true, $admin->getIsAdmin());
    }
}