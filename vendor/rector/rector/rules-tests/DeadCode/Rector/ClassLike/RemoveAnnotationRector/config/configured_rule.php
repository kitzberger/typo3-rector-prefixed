<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210413;

use Rector\DeadCode\Rector\ClassLike\RemoveAnnotationRector;
use Typo3RectorPrefix20210413\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210413\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\DeadCode\Rector\ClassLike\RemoveAnnotationRector::class)->call('configure', [[\Rector\DeadCode\Rector\ClassLike\RemoveAnnotationRector::ANNOTATIONS_TO_REMOVE => ['method', 'Typo3RectorPrefix20210413\\JMS\\DiExtraBundle\\Annotation\\InjectParams']]]);
};
