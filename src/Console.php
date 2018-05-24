<?php

namespace G4\CodeCoverage;

use Questocat\ConsoleColor\ConsoleColor;
use G4\ValueObject\StringLiteral;

class Console
{

    /**
     * @var ConsoleColor
     */
    private $consoleColor;


    public function __construct(ConsoleColor $consoleColor)
    {
        $this->consoleColor = $consoleColor;
    }

    /**
     * @param $message
     */
    public function putsErr(StringLiteral $message)
    {
        fputs(STDERR, $this->consoleColor->white()->redBackground()->render((string) $message));
    }

    /**
     * @param $message
     */
    public function putsOut(StringLiteral $message)
    {
        fputs(STDOUT, $this->consoleColor->white()->greenBackground()->render((string) $message));
    }

    /**
     * @param ExitCode $code
     */
    public function exitWithCode(ExitCode $code)
    {
        exit($code->getValue());
    }
}
