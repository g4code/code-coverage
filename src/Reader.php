<?php

namespace G4\CodeCoverage;

use G4\ValueObject\RealPath;

class Reader
{
    private $reportPath;

    public function __construct(RealPath $reportPath)
    {
        $this->reportPath = $reportPath;
    }

    public function read()
    {
        $xml = simplexml_load_file((string) $this->reportPath);
    }
}
