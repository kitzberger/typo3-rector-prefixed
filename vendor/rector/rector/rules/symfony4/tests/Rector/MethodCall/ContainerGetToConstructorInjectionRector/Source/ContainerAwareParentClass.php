<?php

declare (strict_types=1);
namespace Rector\Symfony4\Tests\Rector\MethodCall\ContainerGetToConstructorInjectionRector\Source;

use Typo3RectorPrefix20210316\Symfony\Component\DependencyInjection\ContainerInterface;
class ContainerAwareParentClass
{
    public function getContainer() : \Typo3RectorPrefix20210316\Symfony\Component\DependencyInjection\ContainerInterface
    {
    }
}
