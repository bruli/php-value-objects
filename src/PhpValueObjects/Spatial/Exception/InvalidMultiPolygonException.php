<?php

declare(strict_types=1);

namespace PhpValueObjects\Spatial\Exception;

use Exception;

final class InvalidMultiPolygonException extends Exception
{
    protected $message = 'Invalid multi polygon data.';
}
