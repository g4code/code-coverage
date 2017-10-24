<?php

namespace G4\CodeCoverage;

class MetricsFormatter
{

    private $metrics;

    public function __construct(Metrics $metrics)
    {
        $this->metrics = $metrics;
    }

    public function format()
    {
        return '';
    }
}
