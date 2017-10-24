<?php


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
        $this->metricsData      = new SimpleXMLElement($data);
        $this->metricsFactory   = new MetricsFactory($this->metricsData);
    }

    protected function tearDown()
    {
        $this->metricsData      = null;
        $this->metricsFactory   = null;
    }
}
