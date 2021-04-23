<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

use Ssch\TYPO3Rector\Rector\v8\v3\RefactorMethodFileContentRector;
use Ssch\TYPO3Rector\Rector\v8\v3\RefactorQueryViewTableWrapRector;
use Ssch\TYPO3Rector\Resources\Icons\IconsProcessor;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/../config.php');
    $services = $containerConfigurator->services();
    $services->set(\Ssch\TYPO3Rector\Rector\v8\v3\RefactorMethodFileContentRector::class);
    $services->set(\Ssch\TYPO3Rector\Rector\v8\v3\RefactorQueryViewTableWrapRector::class);
    $services->set(\Ssch\TYPO3Rector\Resources\Icons\IconsProcessor::class)->autowire();
};
