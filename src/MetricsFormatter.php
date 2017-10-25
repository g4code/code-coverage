<?php

namespace G4\CodeCoverage;

class MetricsFormatter
{

    /**
     * @var Metrics
     */
    private $metrics;

    /**
     * MetricsFormatter constructor.
     * @param Metrics $metrics
     */
    public function __construct(Metrics $metrics)
    {
        $this->metrics = $metrics;
    }

    //TODO: Drasko - change this!
    /**
     * @return array
     */
    public function format()
    {
        return [
            " Required:     " . $this->formatNumber($this->metrics->getRequiredPercentage()->getValue()) . "% ",
            "   Methods:    " . $this->formatNumber($this->metrics->getMethods()->percentage()) . "% ",
            "   Statements: " . $this->formatNumber($this->metrics->getStatements()->percentage()) . "% ",
            "   Elements:   " . $this->formatNumber($this->metrics->getElements()->percentage()) . "% ",
        ];
    }

    /**
     * @param $value
     * @return string
     */
    private function formatNumber($value)
    {
        return number_format($value, 2);
    }
}
