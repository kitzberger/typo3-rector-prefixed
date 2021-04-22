<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

use Rector\Doctrine\Rector\Class_\BlameableBehaviorRector;
use Rector\Doctrine\Rector\Class_\LoggableBehaviorRector;
use Rector\Doctrine\Rector\Class_\SluggableBehaviorRector;
use Rector\Doctrine\Rector\Class_\SoftDeletableBehaviorRector;
use Rector\Doctrine\Rector\Class_\TimestampableBehaviorRector;
use Rector\Doctrine\Rector\Class_\TranslationBehaviorRector;
use Rector\Doctrine\Rector\Class_\TreeBehaviorRector;
use Typo3RectorPrefix20210422\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
# version gedmo/doctrine-extensions 2.x to knplabs/doctrine-behaviors 2.0
return static function (\Typo3RectorPrefix20210422\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Doctrine\Rector\Class_\TimestampableBehaviorRector::class);
    $services->set(\Rector\Doctrine\Rector\Class_\SluggableBehaviorRector::class);
    $services->set(\Rector\Doctrine\Rector\Class_\TreeBehaviorRector::class);
    $services->set(\Rector\Doctrine\Rector\Class_\TranslationBehaviorRector::class);
    $services->set(\Rector\Doctrine\Rector\Class_\SoftDeletableBehaviorRector::class);
    $services->set(\Rector\Doctrine\Rector\Class_\BlameableBehaviorRector::class);
    $services->set(\Rector\Doctrine\Rector\Class_\LoggableBehaviorRector::class);
};
