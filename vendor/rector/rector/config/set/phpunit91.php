<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210407;

use Rector\PHPUnit\Rector\Class_\AddProphecyTraitRector;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Typo3RectorPrefix20210407\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210407\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\PHPUnit\Rector\Class_\AddProphecyTraitRector::class);
    $services->set(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210407\\PHPUnit\\Framework\\TestCase', 'assertFileNotExists', 'assertFileDoesNotExist')])]]);
};
