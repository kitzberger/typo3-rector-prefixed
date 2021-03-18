<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210318;

use Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\ContainerInterface;
use Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Typo3RectorPrefix20210318\Symplify\ComposerJsonManipulator\ValueObject\Option;
use Typo3RectorPrefix20210318\Symplify\PackageBuilder\Parameter\ParameterProvider;
use Typo3RectorPrefix20210318\Symplify\PackageBuilder\Reflection\PrivatesCaller;
use Typo3RectorPrefix20210318\Symplify\SmartFileSystem\SmartFileSystem;
use function Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\Loader\Configurator\service;
return static function (\Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Typo3RectorPrefix20210318\Symplify\ComposerJsonManipulator\ValueObject\Option::INLINE_SECTIONS, ['keywords']);
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire()->autoconfigure();
    $services->load('Typo3RectorPrefix20210318\Symplify\\ComposerJsonManipulator\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/Bundle']);
    $services->set(\Typo3RectorPrefix20210318\Symplify\SmartFileSystem\SmartFileSystem::class);
    $services->set(\Typo3RectorPrefix20210318\Symplify\PackageBuilder\Reflection\PrivatesCaller::class);
    $services->set(\Typo3RectorPrefix20210318\Symplify\PackageBuilder\Parameter\ParameterProvider::class)->args([\Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\ContainerInterface::class)]);
};
