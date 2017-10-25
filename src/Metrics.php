<?php

namespace G4\CodeCoverage;

use G4\ValueObject\IntegerNumber;

class Metrics
{

    /**
     * @var IntegerNumber
     */
    private $requiredPercentage;

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
     * @param IntegerNumber $condition
     */
    public function __construct(
        MetricsData $methods,
        MetricsData $statements,
        MetricsData $elements,
        IntegerNumber $requiredPercentage
    ) {
        $this->methods              = $methods;
        $this->statements           = $statements;
        $this->elements             = $elements;
        $this->requiredPercentage   = $requiredPercentage;
    }

    /**
     * @return MetricsData
     */
    public function getMethods()
    {
        return $this->methods;
    }

    /**
     * @return MetricsData
     */
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * @return MetricsData
     */
    public function getStatements()
    {
        return $this->statements;
    }

    /**
     * @return IntegerNumber
     */
    public function getRequiredPercentage()
    {
        return $this->requiredPercentage;
    }

    /**
     * @return bool
     */
    public function meetsTheCondition()
    {
        return $this->methods->percentage()     >= $this->requiredPercentage->getValue()
            && $this->statements->percentage()  >= $this->requiredPercentage->getValue()
            && $this->elements->percentage()    >= $this->requiredPercentage->getValue();
    }
}
