<?php

class EmailValidator
{
    // Cette méthode vérifie si l'email est valide en utilisant filter_var
    public function isValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
