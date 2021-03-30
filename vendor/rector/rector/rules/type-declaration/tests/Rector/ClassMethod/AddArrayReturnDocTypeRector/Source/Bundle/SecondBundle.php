<?php

declare (strict_types=1);
namespace Rector\TypeDeclaration\Tests\Rector\ClassMethod\AddArrayReturnDocTypeRector\Source\Bundle;

use Typo3RectorPrefix20210330\Symfony\Component\DependencyInjection\ContainerBuilder;
use Typo3RectorPrefix20210330\Symfony\Component\DependencyInjection\ContainerInterface;
use Typo3RectorPrefix20210330\Symfony\Component\HttpKernel\Bundle\BundleInterface;
final class SecondBundle implements \Typo3RectorPrefix20210330\Symfony\Component\HttpKernel\Bundle\BundleInterface
{
    public function boot()
    {
    }
    public function shutdown()
    {
    }
    public function build(\Typo3RectorPrefix20210330\Symfony\Component\DependencyInjection\ContainerBuilder $container)
    {
    }
    public function getContainerExtension()
    {
    }
    public function getName()
    {
    }
    public function getNamespace()
    {
    }
    public function getPath()
    {
    }
    public function setContainer(\Typo3RectorPrefix20210330\Symfony\Component\DependencyInjection\ContainerInterface $container = null)
    {
    }
}
