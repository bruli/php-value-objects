<?php

declare(strict_types=1);

namespace PhpValueObjects\Spatial\Exception;

use Exception;

final class InvalidPolygonException extends Exception
{
    protected $message = 'Invalid polygon data.';
}
