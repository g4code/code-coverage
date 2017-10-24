<?php

use G4\ValueObject\IntegerNumber;
use G4\CodeCoverage\Metrics;
use G4\CodeCoverage\MetricsData;

class MetricsTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    private $elementsMock;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    private $methodsMock;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    private $statementsMock;

    /**
     * @var Metrics
     */
    private $metrics;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    private $requiredPercentageMock;

    public function testMeetsTheConditionTrue()
    {
        $this->methodsMock->expects($this->once())->method('percentage')->willReturn(99.0);
        $this->statementsMock->expects($this->once())->method('percentage')->willReturn(97.7);
        $this->elementsMock->expects($this->once())->method('percentage')->willReturn(98.35);
        $this->requiredPercentageMock->expects($this->exactly(3))->method('getValue')->willReturn(90);

        $this->assertTrue($this->metrics->meetsTheCondition());
    }

    public function testMeetsTheConditionFalse()
    {
        $this->methodsMock->expects($this->once())->method('percentage')->willReturn(67.0);
        $this->requiredPercentageMock->expects($this->once())->method('getValue')->willReturn(90);

        $this->assertFalse($this->metrics->meetsTheCondition());
    }

    protected function setUp()
    {
        $this->elementsMock = $this->getMockBuilder(MetricsData::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->methodsMock = $this->getMockBuilder(MetricsData::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->statementsMock = $this->getMockBuilder(MetricsData::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->requiredPercentageMock = $this->getMockBuilder(IntegerNumber::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->metrics = new Metrics(
            $this->methodsMock,
            $this->statementsMock,
            $this->elementsMock,
            $this->requiredPercentageMock
        );
    }

    protected function tearDown()
    {
        $this->elementsMock             = null;
        $this->methodsMock              = null;
        $this->statementsMock           = null;
        $this->requiredPercentageMock   = null;
        $this->metrics                  = null;
    }
}
