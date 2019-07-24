<?php
declare(strict_types=1);

namespace PhpValueObjects\Identity\Exception;

final class InvalidEnumException extends \Exception
{
    public function __construct(string $value)
    {
        parent::__construct(sprintf('"%s" is not a valid value.', $value));
    }
}
