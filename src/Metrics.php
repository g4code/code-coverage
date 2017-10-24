<?php


namespace G4\CodeCoverage;

use G4\ValueObject\IntegerNumber;

class Metrics
{

    /**
     * @var MetricsData
     */
    private $elements;

    /**
     * @var MetricsData
     */
    private $statements;

    /**
     * @var MetricsData
     */
    private $methods;

    /**
     * Metrics constructor.
     * @param MetricsData $methods
     * @param MetricsData $statements
     * @param MetricsData $elements
     */
    public function __construct(MetricsData $methods, MetricsData $statements, MetricsData $elements)
    {
        $this->methods      = $methods;
        $this->statements   = $statements;
        $this->elements     = $elements;
    }

    /**
     * @param IntegerNumber $requiredPercentage
     * @return bool
     */
    public function meetsTheCondition(IntegerNumber $requiredPercentage)
    {
        return $this->methods->percentage()     >= $requiredPercentage->getValue()
            && $this->statements->percentage()  >= $requiredPercentage->getValue()
            && $this->elements->percentage()    >= $requiredPercentage->getValue();
    }
}
