<?php


use G4\CodeCoverage\Reader;
use G4\ValueObject\RealPath;

class ReaderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    private $reportPathMock;

    /**
     * @var Reader
     */
    private $reader;


    public function testRead()
    {
        $this->reportPathMock
            ->expects($this->once())
            ->method('__toString')
            ->willReturn(realpath(join(DIRECTORY_SEPARATOR, [FIXTURES_PATH, 'code-coverage1.xml'])));
        $this->reader->read();
    }

    protected function setUp()
    {
        $this->reportPathMock = $this->getMockBuilder(RealPath::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->reader = new Reader($this->reportPathMock);
    }

    protected function tearDown()
    {
        $this->reportPathMock   = null;
        $this->reader           = null;
    }
}
