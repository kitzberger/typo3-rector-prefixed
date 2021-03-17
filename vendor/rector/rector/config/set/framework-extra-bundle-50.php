<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210317;

use Rector\Sensio\Rector\ClassMethod\TemplateAnnotationToThisRenderRector;
use Typo3RectorPrefix20210317\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210317\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Sensio\Rector\ClassMethod\TemplateAnnotationToThisRenderRector::class);
};
