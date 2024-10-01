<?php

use PHPUnit\Framework\TestCase;

require 'EmailValidator.php';

class EmailValidatorTest extends TestCase
{
    public function testValidEmail()
    {
        $validator = new EmailValidator();
        $result = $validator->isValidEmail('user@company.com');

        $this->assertTrue($result['isValid']);
        $this->assertEquals('Valid email', $result['message']);
    }

    public function testInvalidEmailFormat()
    {
        $validator = new EmailValidator();
        $result = $validator->isValidEmail('invalid-email-format');

        $this->assertFalse($result['isValid']);
        $this->assertEquals('Invalid email format', $result['message']);
    }

  

    public function testCommonDomainTypos()
    {
        $validator = new EmailValidator();
        $result = $validator->isValidEmail('user@gnail.com');  // Typo dans le domaine

        $this->assertFalse($result['isValid']);
        $this->assertEquals('Did you mean to type a different domain?', $result['message']);
    }

    public function testDomainNotAllowed()
    {
        $validator = new EmailValidator();
        $result = $validator->isValidEmail('user@gmail.com');  // Domaine non autorisé

        $this->assertFalse($result['isValid']);
        $this->assertEquals('Email domain is not allowed', $result['message']);
    }

    public function testAllowedDomain()
    {
        $validator = new EmailValidator();
        $result = $validator->isValidEmail('user@company.com');  // Domaine autorisé

        $this->assertTrue($result['isValid']);
        $this->assertEquals('Valid email', $result['message']);
    }
}
