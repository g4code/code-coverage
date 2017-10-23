<?php


use G4\CodeCoverage\MetricsData;
use G4\ValueObject\IntegerNumber;

class MetricsDataTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    private $coveredIntegerNumberMock;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    private $totalIntegerNumberMock;

    /**
     * @var MetricsData
     */
    private $metricsData;

    public function testPercentage()
    {
        $this->coveredIntegerNumberMock->expects($this->once())->method('getValue')->willReturn(150);
        $this->totalIntegerNumberMock->expects($this->once())->method('getValue')->willReturn(300);

        $this->assertEquals(50.0, $this->metricsData->percentage());
    }

    protected function setUp()
    {
        $this->coveredIntegerNumberMock = $this->getMockBuilder(IntegerNumber::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->totalIntegerNumberMock = $this->getMockBuilder(IntegerNumber::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->metricsData = new MetricsData($this->totalIntegerNumberMock, $this->coveredIntegerNumberMock);
    }

    protected function tearDown()
    {
        $this->coveredIntegerNumberMock     = null;
        $this->totalIntegerNumberMock       = null;
        $this->metricsData                  = null;
    }


}
