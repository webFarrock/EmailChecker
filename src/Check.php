<?php

namespace WebFarrock\EmailChecker;

/**
 * Class Check
 * @package WebFarrock\EmailChecker
 */
class Check
{
    /**
     * @var array набор правил для проверки email. Каждое правило должно реализовать RuleInterface
     */
    private $rules = [];

    /**
     * Check constructor.
     * @param bool $simple - если true - автоматически добавляется одно правило проверки RuleSimple
     */
    public function __construct(bool $simple = true)
    {
        if ($simple) {
            $this->rules[] = new RuleSimple();
        }
    }

    /**
     * @param RuleInterface $rule
     */
    public function addChecker(RuleInterface $rule)
    {
        $this->rules[] = new $rule();
    }

    /**
     * @param string $email
     * @return Result
     */
    public function check(string $email): Result
    {
        $result = new Result();

        foreach ($this->rules as $rule) {
            try{

                if (!$rule->check($email)) {
                    $result->setSuccess();
                }

            } catch (InvalidEmailException $e){
                $result->addErrorMessage($e->getMessage());
            }
        }

        return $result;
    }
}