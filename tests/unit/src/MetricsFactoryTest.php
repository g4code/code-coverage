<?php

use G4\ValueObject\IntegerNumber;
use G4\CodeCoverage\MetricsFactory;
use G4\CodeCoverage\Metrics;

class MetricsFactoryTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var SimpleXMLElement
     */
    private $metricsData;

    /**
     * @var MetricsFactory
     */
    private $metricsFactory;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    private $requiredPercentageMock;

    public function testCreate()
    {
        $this->assertInstanceOf(Metrics::class, $this->metricsFactory->create());
    }

    protected function setUp()
    {
        $data = '<?xml version="1.0" encoding="UTF-8"?>
            <coverage generated="1508761703">
                <project timestamp="1508761703">
                    <metrics files="41" loc="1388" ncloc="1107" classes="37" methods="101" coveredmethods="100" conditionals="0" coveredconditionals="0" statements="264" coveredstatements="259" elements="365" coveredelements="359"/>
                </project>
            </coverage>';

        $this->requiredPercentageMock = $this->getMockBuilder(IntegerNumber::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->metricsData      = new SimpleXMLElement($data);
        $this->metricsFactory   = new MetricsFactory($this->metricsData, $this->requiredPercentageMock);
    }

    protected function tearDown()
    {
        $this->requiredPercentageMock   = null;
        $this->metricsData              = null;
        $this->metricsFactory           = null;
    }
}
