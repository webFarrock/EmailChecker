<?php

namespace WebFarrock\EmailChecker;

/**
 * Class RuleMxRecord
 * @package WebFarrock\EmailChecker
 */
class RuleMxRecord implements RuleInterface
{
    public function check(string $email)
    {
        $hostname = explode('@', $email)[1];

        getmxrr($hostname, $mxhosts);

        if (empty($mxhosts)) {
            throw new InvalidEmailException('Не пройдена проверка MX записи');
        }

        return true;
    }
}