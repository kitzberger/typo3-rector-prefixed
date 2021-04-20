<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420;

use Rector\NetteToSymfony\Rector\Class_\FormControlToControllerAndFormTypeRector;
use Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\NetteToSymfony\Rector\Class_\FormControlToControllerAndFormTypeRector::class);
};
