<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210316;

use Rector\RectorGenerator\Rector\Closure\AddNewServiceToSymfonyPhpConfigRector;
use Typo3RectorPrefix20210316\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use function Typo3RectorPrefix20210316\Symfony\Component\DependencyInjection\Loader\Configurator\service;
use Typo3RectorPrefix20210316\Symplify\SmartFileSystem\FileSystemGuard;
return static function (\Typo3RectorPrefix20210316\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire()->autoconfigure()->bind(\Rector\RectorGenerator\Rector\Closure\AddNewServiceToSymfonyPhpConfigRector::class, \Typo3RectorPrefix20210316\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Rector\RectorGenerator\Rector\Closure\AddNewServiceToSymfonyPhpConfigRector::class));
    $services->load('Rector\\RectorGenerator\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/Exception', __DIR__ . '/../src/ValueObject', __DIR__ . '/../src/Rector']);
    $services->set(\Rector\RectorGenerator\Rector\Closure\AddNewServiceToSymfonyPhpConfigRector::class)->autowire(\false);
    $services->set(\Typo3RectorPrefix20210316\Symplify\SmartFileSystem\FileSystemGuard::class);
};
