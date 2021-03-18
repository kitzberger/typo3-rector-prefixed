<?php

declare (strict_types=1);
namespace Rector\TypeDeclaration\Tests\Rector\ClassMethod\AddMethodCallBasedStrictParamTypeRector\Source;

use Typo3RectorPrefix20210318\Ramsey\Uuid\UuidInterface;
final class Coconut
{
    public function getId() : \Typo3RectorPrefix20210318\Ramsey\Uuid\UuidInterface
    {
    }
}
