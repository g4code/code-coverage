<?php

namespace G4\CodeCoverage;

use Emanci\ConsoleColor\ConsoleColor;

class Presenter
{

    private $consoleColor;

    private $metrics;


    public function __construct(Metrics $metrics)
    {
        $this->metrics      = $metrics;
        $this->consoleColor = new ConsoleColor();
    }

    public function stdOud()
    {
        $message = $this->consoleColor->white()->greenBackground()->render('OK') . PHP_EOL;
        fputs(STDOUT, $message);
        exit(0);
    }

    public function stdErr()
    {
        $message = $this->consoleColor->white()->redBackground()->render('NOK') . PHP_EOL;
        fputs(STDERR, $message);
        exit(1);
    }
}
