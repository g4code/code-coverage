<?php

namespace G4\CodeCoverage;

use Questocat\ConsoleColor\ConsoleColor;
use G4\ValueObject\StringLiteral;

class Console
{

    private ConsoleColor $consoleColor;

    public function __construct(ConsoleColor $consoleColor)
    {
        $this->consoleColor = $consoleColor;
    }

    public function putsErr(StringLiteral $message)
    {
        $this->consoleColor->white()->redBackground()->render((string) $message);
    }

    public function putsOut(StringLiteral $message)
    {
        $this->consoleColor->white()->greenBackground()->render((string) $message);
    }

    /**
     * @param ExitCode $code
     */
    public function exitWithCode(ExitCode $code)
    {
        exit($code->getValue());
    }
}
