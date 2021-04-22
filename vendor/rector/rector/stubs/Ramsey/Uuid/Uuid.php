<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422\Ramsey\Uuid;

if (\class_exists('Ramsey\\Uuid\\Uuid')) {
    return;
}
class Uuid implements \Typo3RectorPrefix20210422\Ramsey\Uuid\UuidInterface
{
    public static function uuid4() : self
    {
        return new \Typo3RectorPrefix20210422\Ramsey\Uuid\Uuid();
    }
    public function toString()
    {
        // dummy value
        return '%s-%s-%s-%s-%s';
    }
}
