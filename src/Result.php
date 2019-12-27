<?php

namespace WebFarrock\EmailChecker;

/**
 * Class Result
 * @package WebFarrock\EmailChecker
 */
class Result
{
    /**
     * @var bool
     */
    protected $success = true;

    /**
     * @var array массив с сообщениями об ошибках
     */
    protected $errors = [];

    /**
     * @param string $message
     */
    public function addErrorMessage(string $message)
    {
        $this->success = false;
        $this->errors[] = $message;
    }

    /**
     * @return array
     */
    public function getErrorMessages(): array
    {
        return $this->errors;
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

}