<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420;

use Rector\DeadCode\Rector\ClassLike\RemoveAnnotationRector;
use Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\DeadCode\Rector\ClassLike\RemoveAnnotationRector::class)->call('configure', [[\Rector\DeadCode\Rector\ClassLike\RemoveAnnotationRector::ANNOTATIONS_TO_REMOVE => ['method', 'JMS\\DiExtraBundle\\Annotation\\InjectParams']]]);
};
