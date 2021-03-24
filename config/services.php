<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210324;

use Rector\ChangesReporting\Output\ConsoleOutputFormatter;
use Rector\Core\Configuration\Option;
use Ssch\TYPO3Rector\Console\Application;
use Ssch\TYPO3Rector\Console\Output\DecoratedConsoleOutputFormatter;
use Typo3RectorPrefix20210324\Symfony\Component\Console\Application as SymfonyApplication;
use Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/../utils/**/config/config.php', null, \true);
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::AUTO_IMPORT_NAMES, \true);
    $parameters->set(\Rector\Core\Configuration\Option::PHPSTAN_FOR_RECTOR_PATH, __DIR__ . '/../utils/phpstan/config/extension.neon');
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire();
    $services->alias(\Typo3RectorPrefix20210324\Symfony\Component\Console\Application::class, \Ssch\TYPO3Rector\Console\Application::class);
    $services->load('Ssch\\TYPO3Rector\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/Rector', __DIR__ . '/../src/Set', __DIR__ . '/../src/Bootstrap', __DIR__ . '/../src/HttpKernel', __DIR__ . '/../src/Compiler', __DIR__ . '/../src/ValueObject']);
    $services->set(\Ssch\TYPO3Rector\Console\Output\DecoratedConsoleOutputFormatter::class)->decorate(\Rector\ChangesReporting\Output\ConsoleOutputFormatter::class);
};
