<?php

use G4\CodeCoverage\Reader;
use G4\ValueObject\RealPath;
use G4\CodeCoverage\Exceptions\InvalidXmlFileFormatException;

class ReaderTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @var RealPath&\PHPUnit\Framework\MockObject\MockObject
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
            ->willReturn(realpath(join(DIRECTORY_SEPARATOR, [FIXTURES_PATH, 'code-coverage.xml'])));

        $xml = $this->reader->read();
        $this->assertInstanceOf(\SimpleXMLElement::class, $xml);
        $this->assertInstanceOf(\SimpleXMLElement::class, $xml->project->metrics);
    }

    public function testReadException()
    {
        $this->reportPathMock
            ->expects($this->exactly(2))
            ->method('__toString')
            ->willReturn(realpath(join(DIRECTORY_SEPARATOR, [FIXTURES_PATH, 'code-coverage-exception.xml'])));

        $this->expectException(InvalidXmlFileFormatException::class);
        $this->reader->read();
    }

    protected function setUp(): void
    {
        $this->reportPathMock = $this->getMockBuilder(RealPath::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->reader = new Reader($this->reportPathMock);
    }

    protected function tearDown(): void
    {
        $this->reportPathMock   = null;
        $this->reader           = null;
    }
}
