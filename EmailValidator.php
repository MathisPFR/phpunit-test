<?php

class EmailValidator
{
    // Check if email is valid using filter_var and other checks
    public function isValidEmail($email)
    {
        // Basic validation using filter_var
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['isValid' => false, 'message' => 'Invalid email format'];
        }

        

        // Check for common typos in domain names
        if ($this->hasCommonDomainTypos($email)) {
            return ['isValid' => false, 'message' => 'Did you mean to type a different domain?'];
        }

        // Example of allowed domains (optional)
        $allowedDomains = ['company.com'];
        if (!$this->isAllowedDomain($email, $allowedDomains)) {
            return ['isValid' => false, 'message' => 'Email domain is not allowed'];
        }

        return ['isValid' => true, 'message' => 'Valid email'];
    }

    // Helper function to check for common domain typos
    private function hasCommonDomainTypos($email)
    {
        $domainTypos = ['gnail.com' => 'gmail.com', 'yaho.com' => 'yahoo.com'];
        $domain = substr(strrchr($email, "@"), 1);

        return array_key_exists($domain, $domainTypos);
    }

    // Helper function to check if the domain is in the allowed list
    private function isAllowedDomain($email, $allowedDomains)
    {
        $domain = substr(strrchr($email, "@"), 1);
        return in_array($domain, $allowedDomains);
    }
}

