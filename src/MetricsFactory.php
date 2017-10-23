<?php


namespace G4\CodeCoverage;

class MetricsFactory
{

    private $metricsData;

    public function __construct(SimpleXMLElement $metricsData)
    {
        $this->metricsData = $metricsData;
    }

    public function create()
    {
        return new Metrics();
    }
}
