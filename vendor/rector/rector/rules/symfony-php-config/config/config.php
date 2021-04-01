<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210401;

use Typo3RectorPrefix20210401\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Typo3RectorPrefix20210401\Symfony\Component\Yaml\Parser;
use Typo3RectorPrefix20210401\Symplify\PhpConfigPrinter\Printer\PhpParserPhpConfigPrinter;
use Typo3RectorPrefix20210401\Symplify\PhpConfigPrinter\YamlToPhpConverter;
return static function (\Typo3RectorPrefix20210401\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire()->autoconfigure();
    $services->load('Rector\\SymfonyPhpConfig\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/Rector']);
    $services->set(\Typo3RectorPrefix20210401\Symplify\PhpConfigPrinter\YamlToPhpConverter::class);
    $services->set(\Typo3RectorPrefix20210401\Symfony\Component\Yaml\Parser::class);
    $services->set(\Typo3RectorPrefix20210401\Symplify\PhpConfigPrinter\Printer\PhpParserPhpConfigPrinter::class);
};
