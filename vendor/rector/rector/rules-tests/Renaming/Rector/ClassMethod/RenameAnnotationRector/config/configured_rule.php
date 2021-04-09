<?php

namespace Typo3RectorPrefix20210409;

use Rector\Renaming\Rector\ClassMethod\RenameAnnotationRector;
use Rector\Renaming\ValueObject\RenameAnnotation;
use Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\ClassMethod\RenameAnnotationRector::class)->call('configure', [[\Rector\Renaming\Rector\ClassMethod\RenameAnnotationRector::RENAMED_ANNOTATIONS_IN_TYPES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\RenameAnnotation('Typo3RectorPrefix20210409\\PHPUnit\\Framework\\TestCase', 'scenario', 'test')])]]);
};
