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
     */
    public function __construct(Metrics $metrics)
    {
        $this->metrics      = $metrics;
        $this->consoleColor = new ConsoleColor();
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
            fputs(STDOUT, $this->consoleColor->white()->redBackground()->render($message));
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
