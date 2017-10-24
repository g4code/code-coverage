<?php


namespace G4\CodeCoverage;

use G4\ValueObject\IntegerNumber;

class MetricsData
{

    const ONE_HUNDRED = 100;

    /**
     * @var IntegerNumber
     */
    private $covered;

    /**
     * @var IntegerNumber
     */
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
        return (int) self::ONE_HUNDRED * ($this->covered->getValue() / $this->total->getValue());
    }
}
