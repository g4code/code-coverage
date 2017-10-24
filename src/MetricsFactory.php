<?php

namespace G4\CodeCoverage;

use G4\ValueObject\Dictionary;
use G4\ValueObject\IntegerNumber;

class MetricsFactory
{

    /**
     * @var Dictionary
     */
    private $metricsData;

    /**
     * MetricsFactory constructor.
     * @param \SimpleXMLElement $xmlData
     */
    public function __construct(\SimpleXMLElement $xmlData)
    {
        $this->metricsData = $this->convertToDictionary($xmlData);
    }

    /**
     * @return Metrics
     */
    public function create()
    {
        return new Metrics(
            new MetricsData(
                new IntegerNumber((int) $this->metricsData->get(ParamsConsts::METHODS)),
                new IntegerNumber((int) $this->metricsData->get(ParamsConsts::COVEREDMETHODS))
            ),
            new MetricsData(
                new IntegerNumber((int) $this->metricsData->get(ParamsConsts::STATEMENTS)),
                new IntegerNumber((int) $this->metricsData->get(ParamsConsts::COVEREDSTATEMENTS))
            ),
            new MetricsData(
                new IntegerNumber((int) $this->metricsData->get(ParamsConsts::ELEMENTS)),
                new IntegerNumber((int) $this->metricsData->get(ParamsConsts::COVEREDELEMENTS))
            )
        );
    }

    /**
     * @param \SimpleXMLElement $xmlData
     * @return Dictionary
     */
    private function convertToDictionary(\SimpleXMLElement $xmlData)
    {
        $data = [];
        foreach ($xmlData->project->metrics->attributes() as $atribute) {
            $data[$atribute->getName()] = (string) $atribute;
        }
        return new Dictionary($data);
    }
}
