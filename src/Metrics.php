<?php


namespace G4\CodeCoverage;

use G4\ValueObject\IntegerNumber;

class Metrics
{

    private $elements;

    private $statements;

    private $methods;

    public function __construct(MetricsData $methods, MetricsData $statements, MetricsData $elements)
    {
        $this->methods      = $methods;
        $this->statements   = $statements;
        $this->elements     = $elements;
    }

    public function meetsTheCondition(IntegerNumber $requiredPercentage)
    {
        return $this->methods->percentage()     >= $requiredPercentage->getValue()
            && $this->statements->percentage()  >= $requiredPercentage->getValue()
            && $this->elements->percentage()    >= $requiredPercentage->getValue();
    }
}
