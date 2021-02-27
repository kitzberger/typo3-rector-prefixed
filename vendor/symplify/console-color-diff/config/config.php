<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210227;

use Typo3RectorPrefix20210227\SebastianBergmann\Diff\Differ;
use Typo3RectorPrefix20210227\Symfony\Component\Console\Style\SymfonyStyle;
use Typo3RectorPrefix20210227\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Typo3RectorPrefix20210227\Symplify\PackageBuilder\Console\Style\SymfonyStyleFactory;
use Typo3RectorPrefix20210227\Symplify\PackageBuilder\Reflection\PrivatesAccessor;
use function Typo3RectorPrefix20210227\Symfony\Component\DependencyInjection\Loader\Configurator\service;
return static function (\Typo3RectorPrefix20210227\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire()->autoconfigure();
    $services->load('Typo3RectorPrefix20210227\Symplify\\ConsoleColorDiff\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/Bundle']);
    $services->set(\Typo3RectorPrefix20210227\SebastianBergmann\Diff\Differ::class);
    $services->set(\Typo3RectorPrefix20210227\Symplify\PackageBuilder\Console\Style\SymfonyStyleFactory::class);
    $services->set(\Typo3RectorPrefix20210227\Symfony\Component\Console\Style\SymfonyStyle::class)->factory([\Typo3RectorPrefix20210227\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Typo3RectorPrefix20210227\Symplify\PackageBuilder\Console\Style\SymfonyStyleFactory::class), 'create']);
    $services->set(\Typo3RectorPrefix20210227\Symplify\PackageBuilder\Reflection\PrivatesAccessor::class);
};
