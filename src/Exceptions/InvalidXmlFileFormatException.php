<?php

namespace G4\CodeCoverage\Exceptions;

use Exception;
use G4\CodeCoverage\ErrorCodes;
use G4\ValueObject\RealPath;

class InvalidXmlFileFormatException extends Exception
{

    const MESSAGE = 'Invalid XML file format in file: %s';

    public function __construct(RealPath $configPath)
    {
        parent::__construct(
            sprintf(self::MESSAGE, (string) $configPath),
            ErrorCodes::INVALID_XML_FILE_FORMAT_EXCEPTION
        );
    }
}
