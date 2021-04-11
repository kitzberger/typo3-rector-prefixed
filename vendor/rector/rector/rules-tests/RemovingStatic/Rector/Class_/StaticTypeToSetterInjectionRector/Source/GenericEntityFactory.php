<?php

declare (strict_types=1);
namespace Rector\Tests\RemovingStatic\Rector\Class_\StaticTypeToSetterInjectionRector\Source;

use Typo3RectorPrefix20210411\phpDocumentor\Reflection\Types\Integer;
final class GenericEntityFactory
{
    public static function make() : \Typo3RectorPrefix20210411\phpDocumentor\Reflection\Types\Integer
    {
        return 5;
    }
}
