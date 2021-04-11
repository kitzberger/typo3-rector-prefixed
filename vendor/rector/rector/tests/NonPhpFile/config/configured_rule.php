<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210411;

use Rector\Core\Configuration\Option;
use Rector\Core\Tests\NonPhpFile\Source\TextNonPhpFileProcessor;
use Typo3RectorPrefix20210411\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210411\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Core\Tests\NonPhpFile\Source\TextNonPhpFileProcessor::class);
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::PATHS, [__DIR__ . '/../Fixture/']);
};
