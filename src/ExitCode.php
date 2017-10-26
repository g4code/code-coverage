<?php


namespace G4\CodeCoverage;

use G4\CodeCoverage\Exceptions\InvalidExitCodeException;

class ExitCode
{

    const SUCCESS   = 0;
    const ERROR     = 1;

    private $value;

    public function __construct($value)
    {
        if (!in_array($value, [self::SUCCESS, self::ERROR])) {
            throw new InvalidExitCodeException($value);
        }
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public static function error()
    {
        return new self(self::ERROR);
    }

    public static function success()
    {
        return new self(self::SUCCESS);
    }
}
