<?php

namespace G4\CodeCoverage;

use Emanci\ConsoleColor\ConsoleColor;

class Presenter
{

    /**
     * @var ConsoleColor
     */
    private $consoleColor;

    /**
     * @var Metrics
     */
    private $metrics;

    /**
     * Presenter constructor.
     * @param Metrics $metrics
     * @param ConsoleColor $consoleColor
     */
    public function __construct(Metrics $metrics, ConsoleColor $consoleColor)
    {
        $this->metrics      = $metrics;
        $this->consoleColor = $consoleColor;
    }

    public function stdOud()
    {
        foreach ($this->makeMetricsFormatter()->format() as $message) {
            fputs(STDOUT, $this->consoleColor->white()->greenBackground()->render($message));
        }
        exit(0);
    }

    public function stdErr()
    {
        foreach ($this->makeMetricsFormatter()->format() as $message) {
            fputs(STDERR, $this->consoleColor->white()->redBackground()->render($message));
        }
        exit(1);
    }

    /**
     * @return MetricsFormatter
     */
    public function makeMetricsFormatter()
    {
        return new MetricsFormatter($this->metrics);
    }
}
