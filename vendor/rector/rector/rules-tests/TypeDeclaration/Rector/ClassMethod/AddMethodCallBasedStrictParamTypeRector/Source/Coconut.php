<?php

declare (strict_types=1);
namespace Rector\Tests\TypeDeclaration\Rector\ClassMethod\AddMethodCallBasedStrictParamTypeRector\Source;

use Typo3RectorPrefix20210415\Ramsey\Uuid\UuidInterface;
final class Coconut
{
    public function getId() : \Typo3RectorPrefix20210415\Ramsey\Uuid\UuidInterface
    {
    }
}
