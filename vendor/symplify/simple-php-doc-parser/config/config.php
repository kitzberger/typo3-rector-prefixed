<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210401;

use PHPStan\PhpDocParser\Lexer\Lexer;
use PHPStan\PhpDocParser\Parser\ConstExprParser;
use PHPStan\PhpDocParser\Parser\PhpDocParser;
use PHPStan\PhpDocParser\Parser\TypeParser;
use Typo3RectorPrefix20210401\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210401\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire()->autoconfigure();
    $services->load('Typo3RectorPrefix20210401\Symplify\\SimplePhpDocParser\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/Bundle']);
    $services->set(\PHPStan\PhpDocParser\Parser\PhpDocParser::class);
    $services->set(\PHPStan\PhpDocParser\Lexer\Lexer::class);
    $services->set(\PHPStan\PhpDocParser\Parser\TypeParser::class);
    $services->set(\PHPStan\PhpDocParser\Parser\ConstExprParser::class);
};
