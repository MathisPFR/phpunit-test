<?php

use PHPUnit\Framework\TestCase;

require 'EmailValidator.php';

class EmailValidatorTest extends TestCase
{
    public function testValidEmail()
    {
        $validator = new EmailValidator();
        
        // Vérifier qu'un email valide passe la validation
        $this->assertTrue($validator->isValidEmail('test@example.com'));
    }

    public function testInvalidEmailWithoutAtSymbol()
    {
        $validator = new EmailValidator();
        
        // Vérifier qu'un email sans symbole @ échoue
        $this->assertFalse($validator->isValidEmail('testexample.com'));
    }

    public function testInvalidEmailWithoutDomain()
    {
        $validator = new EmailValidator();
        
        // Vérifier qu'un email sans domaine échoue
        $this->assertFalse($validator->isValidEmail('test@'));
    }

    public function testInvalidEmailWithSpaces()
    {
        $validator = new EmailValidator();
        
        // Vérifier qu'un email avec des espaces échoue
        $this->assertFalse($validator->isValidEmail('test @example.com'));
    }
}
