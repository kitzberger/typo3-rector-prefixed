<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210308;

use Typo3RectorPrefix20210308\Doctrine\Common\Annotations\Reader;
use PHPStan\PhpDocParser\Lexer\Lexer;
use PHPStan\PhpDocParser\Parser\PhpDocParser;
use Rector\BetterPhpDocParser\PhpDocParser\BetterPhpDocParser;
use Rector\DoctrineAnnotationGenerated\ConstantPreservingAnnotationReader;
use Typo3RectorPrefix20210308\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210308\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->autowire()->public()->autoconfigure();
    $services->load('Rector\\BetterPhpDocParser\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/ValueObject', __DIR__ . '/../src/*/*Info.php', __DIR__ . '/../src/*Info.php', __DIR__ . '/../src/Attributes/Ast/PhpDoc', __DIR__ . '/../src/PhpDocNode']);
    $services->set(\PHPStan\PhpDocParser\Lexer\Lexer::class);
    $services->alias(\PHPStan\PhpDocParser\Parser\PhpDocParser::class, \Rector\BetterPhpDocParser\PhpDocParser\BetterPhpDocParser::class);
    $services->alias(\Typo3RectorPrefix20210308\Doctrine\Common\Annotations\Reader::class, \Rector\DoctrineAnnotationGenerated\ConstantPreservingAnnotationReader::class);
};
