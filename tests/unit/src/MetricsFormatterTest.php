<?php


use G4\CodeCoverage\MetricsFormatter;
use G4\CodeCoverage\Metrics;
use G4\ValueObject\IntegerNumber;
use G4\CodeCoverage\MetricsData;

class MetricsFormatterTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @var Metrics
     */
    private $metrics;

    /**
     * @var MetricsFormatter
     */
    private $metricsFormatter;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    private $metricsDataMock;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    private $requiredPercentageMock;

    public function testFormat()
    {
        $this->metricsDataMock->expects($this->exactly(3))->method('percentage')->willReturn(54);
        $this->requiredPercentageMock->expects($this->once())->method('getValue')->willReturn(23);

        $data = $this->metricsFormatter->format();

        $this->assertEquals(' Required:     23.00% ', $data[0]);
        $this->assertEquals('   Methods:    54.00% ', $data[1]);
        $this->assertEquals('   Statements: 54.00% ', $data[2]);
        $this->assertEquals('   Elements:   54.00% ', $data[3]);
    }

    protected function setUp(): void
    {
        $this->requiredPercentageMock = $this->getMockBuilder(IntegerNumber::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->metricsDataMock = $this->getMockBuilder(MetricsData::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->metrics = new Metrics(
            $this->metricsDataMock,
            $this->metricsDataMock,
            $this->metricsDataMock,
            $this->requiredPercentageMock
        );

        $this->metricsFormatter = new MetricsFormatter($this->metrics);
    }

    protected function tearDown(): void
    {
        $this->requiredPercentageMock   = null;
        $this->metricsDataMock          = null;
        $this->metrics                  = null;
        $this->metricsFormatter         = null;
    }
}
