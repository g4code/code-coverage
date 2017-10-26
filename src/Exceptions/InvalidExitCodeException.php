<?php


namespace G4\CodeCoverage\Exceptions;

use G4\CodeCoverage\ErrorCodes;
use G4\CodeCoverage\ExitCode;

class InvalidExitCodeException extends \Exception
{

    const MESSAGE = 'Invalid exit code value: %s (valid: %s, %s)';

    public function __construct($exitCodeValue)
    {
        parent::__construct(
            sprintf(self::MESSAGE, $exitCodeValue, ExitCode::SUCCESS, ExitCode::ERROR),
            ErrorCodes::INVALID_EXIT_CODE_EXCEPTION
        );
    }
}
