<?php


namespace G4\CodeCoverage;

use G4\ValueObject\IntegerNumber;

class MetricsData
{

    const ONE_HUNDRED = 100;

    private $covered;

    private $total;

    /**
     * MetricsData constructor.
     * @param IntegerNumber $total
     * @param IntegerNumber $covered
     */
    public function __construct(IntegerNumber $total, IntegerNumber $covered)
    {
        $this->covered  = $covered;
        $this->total    = $total;
    }

    /**
     * @return int
     */
    public function percentage()
    {
        return self::ONE_HUNDRED * ($this->covered->getValue() / $this->total->getValue());
    }
}
