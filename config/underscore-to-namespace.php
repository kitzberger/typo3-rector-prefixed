<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420;

use Ssch\TYPO3Rector\Rector\Migrations\RenameClassMapAliasRector;
use Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/config.php');
    $services = $containerConfigurator->services();
    $services->set('rename_class_alias_map_underscore_to_namespaces')->class(\Ssch\TYPO3Rector\Rector\Migrations\RenameClassMapAliasRector::class)->call('configure', [[\Ssch\TYPO3Rector\Rector\Migrations\RenameClassMapAliasRector::CLASS_ALIAS_MAPS => [__DIR__ . '/../Migrations/Code/ClassAliasMap.php']]]);
};
