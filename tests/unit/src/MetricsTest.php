<?php

use G4\ValueObject\IntegerNumber;
use G4\CodeCoverage\Metrics;
use G4\CodeCoverage\MetricsData;

class MetricsTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @var MetricsData&\PHPUnit\Framework\MockObject\MockObject
     */
    private $elementsMock;

    /**
     * @var MetricsData&\PHPUnit\Framework\MockObject\MockObject
     */
    private $methodsMock;

    /**
     * @var MetricsData&\PHPUnit\Framework\MockObject\MockObject
     */
    private $statementsMock;

    /**
     * @var Metrics
     */
    private $metrics;

    /**
     * @var IntegerNumber&\PHPUnit\Framework\MockObject\MockObject
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

    public function testGetters()
    {
        $this->assertInstanceOf(MetricsData::class, $this->metrics->getElements());
        $this->assertInstanceOf(MetricsData::class, $this->metrics->getMethods());
        $this->assertInstanceOf(MetricsData::class, $this->metrics->getStatements());
        $this->assertInstanceOf(IntegerNumber::class, $this->metrics->getRequiredPercentage());
    }

    protected function setUp(): void
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

    protected function tearDown(): void
    {
        $this->elementsMock             = null;
        $this->methodsMock              = null;
        $this->statementsMock           = null;
        $this->requiredPercentageMock   = null;
        $this->metrics                  = null;
    }
}
