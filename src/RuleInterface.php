<?php

namespace WebFarrock\EmailChecker;

/**
 * Interface RuleInterface
 * @package WebFarrock\EmailChecker
 */
interface RuleInterface
{
    /**
     * @param string $email
     * @return mixed
     */
    public function check(string $email);
}