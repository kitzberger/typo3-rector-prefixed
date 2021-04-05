<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210405;

use Rector\MockistaToMockery\Rector\Class_\MockeryTearDownRector;
use Rector\MockistaToMockery\Rector\ClassMethod\MockistaMockToMockeryMockRector;
use Typo3RectorPrefix20210405\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210405\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\MockistaToMockery\Rector\Class_\MockeryTearDownRector::class);
    $services->set(\Rector\MockistaToMockery\Rector\ClassMethod\MockistaMockToMockeryMockRector::class);
};
