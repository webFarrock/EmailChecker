<?php

namespace WebFarrock\EmailChecker;

/**
 * Class RuleSimple
 * @package WebFarrock\EmailChecker
 */
class RuleSimple implements RuleInterface
{
    /**
     * @param string $email
     * @return bool
     * @throws InvalidEmailException
     */
    public function check(string $email)
    {
        if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException('Email не валиден');
        }

        return true;
    }
}