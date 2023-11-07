<?php


use G4\CodeCoverage\Console;
use Questocat\ConsoleColor\ConsoleColor;

class ConsoleTest extends \PHPUnit\Framework\TestCase
{

    public function testConstruct()
    {
        $this->expectNotToPerformAssertions();
        $consoleColorMock = $this->getMockBuilder(ConsoleColor::class)
            ->disableOriginalConstructor()
            ->getMock();

        new Console($consoleColorMock);
    }
}
