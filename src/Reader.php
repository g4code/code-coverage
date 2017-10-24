<?php

namespace G4\CodeCoverage;

use G4\CodeCoverage\Exceptions\InvalidXmlFileFormatException;
use G4\ValueObject\RealPath;

class Reader
{

    /**
     * @var RealPath
     */
    private $reportPath;

    /**
     * Reader constructor.
     * @param RealPath $reportPath
     */
    public function __construct(RealPath $reportPath)
    {
        $this->reportPath = $reportPath;
    }

    /**
     * @return \SimpleXMLElement
     * @throws InvalidXmlFileFormatException
     */
    public function read()
    {
        $xml = simplexml_load_file((string) $this->reportPath);
        if (!$xml instanceof \SimpleXMLElement
            || $xml->getName() !== ParamsConsts::COVERAGE
            || !$xml->project instanceof \SimpleXMLElement
            || $xml->project->getName() !== ParamsConsts::PROJECT
            || !$xml->project->metrics instanceof \SimpleXMLElement
            || $xml->project->metrics->getName() !== ParamsConsts::METRICS
        ) {
            throw new InvalidXmlFileFormatException($this->reportPath);
        }
        return $xml;
    }
}
