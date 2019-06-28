<?php

namespace PhpValueObjects\Spatial\Exception;

class InvalidMultiPolygonException extends \Exception
{
    protected $message = 'Invalid multi polygon data.';
}
