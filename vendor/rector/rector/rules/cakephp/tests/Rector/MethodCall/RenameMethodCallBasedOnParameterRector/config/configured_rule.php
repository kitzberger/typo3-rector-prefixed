<?php

namespace Typo3RectorPrefix20210405;

use Rector\CakePHP\Rector\MethodCall\RenameMethodCallBasedOnParameterRector;
use Rector\CakePHP\Tests\Rector\MethodCall\RenameMethodCallBasedOnParameterRector\Source\SomeModelType;
use Rector\CakePHP\ValueObject\RenameMethodCallBasedOnParameter;
use Typo3RectorPrefix20210405\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210405\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\CakePHP\Rector\MethodCall\RenameMethodCallBasedOnParameterRector::class)->call('configure', [[\Rector\CakePHP\Rector\MethodCall\RenameMethodCallBasedOnParameterRector::CALLS_WITH_PARAM_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\CakePHP\ValueObject\RenameMethodCallBasedOnParameter(\Rector\CakePHP\Tests\Rector\MethodCall\RenameMethodCallBasedOnParameterRector\Source\SomeModelType::class, 'getParam', 'paging', 'getAttribute'), new \Rector\CakePHP\ValueObject\RenameMethodCallBasedOnParameter(\Rector\CakePHP\Tests\Rector\MethodCall\RenameMethodCallBasedOnParameterRector\Source\SomeModelType::class, 'withParam', 'paging', 'withAttribute')])]]);
};
