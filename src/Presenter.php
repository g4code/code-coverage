<?php

namespace G4\CodeCoverage;

use G4\ValueObject\StringLiteral;

class Presenter
{

    /**
     * @var Console
     */
    private $console;

    /**
     * @var Metrics
     */
    private $metrics;

    /**
     * Presenter constructor.
     * @param Metrics $metrics
     * @param Console $console
     */
    public function __construct(Metrics $metrics, Console $console)
    {
        $this->metrics  = $metrics;
        $this->console  = $console;
    }

    public function stdErr()
    {
        foreach ($this->makeMetricsFormatter()->format() as $message) {
            $this->console->putsErr(new StringLiteral($message));
        }
        $this->console->exitWithCode(ExitCode::error());
    }

    public function stdOut()
    {
        foreach ($this->makeMetricsFormatter()->format() as $message) {
            $this->console->putsOut(new StringLiteral($message));
        }
        $this->console->exitWithCode(ExitCode::success());
    }

    /**
     * @return MetricsFormatter
     */
    public function makeMetricsFormatter()
    {
        return new MetricsFormatter($this->metrics);
    }
}
