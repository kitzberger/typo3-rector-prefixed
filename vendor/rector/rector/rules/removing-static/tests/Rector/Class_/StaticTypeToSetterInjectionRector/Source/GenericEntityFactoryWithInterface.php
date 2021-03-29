<?php

declare (strict_types=1);
namespace Rector\RemovingStatic\Tests\Rector\Class_\StaticTypeToSetterInjectionRector\Source;

use Typo3RectorPrefix20210329\phpDocumentor\Reflection\Types\Integer;
final class GenericEntityFactoryWithInterface
{
    public static function make() : \Typo3RectorPrefix20210329\phpDocumentor\Reflection\Types\Integer
    {
        return 5;
    }
}
