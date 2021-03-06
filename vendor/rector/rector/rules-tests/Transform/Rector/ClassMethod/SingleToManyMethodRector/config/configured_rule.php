<?php

namespace Typo3RectorPrefix20210423;

use Rector\Tests\Transform\Rector\ClassMethod\SingleToManyMethodRector\Source\OneToManyInterface;
use Rector\Transform\Rector\ClassMethod\SingleToManyMethodRector;
use Rector\Transform\ValueObject\SingleToManyMethod;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\ClassMethod\SingleToManyMethodRector::class)->call('configure', [[\Rector\Transform\Rector\ClassMethod\SingleToManyMethodRector::SINGLES_TO_MANY_METHODS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\SingleToManyMethod(\Rector\Tests\Transform\Rector\ClassMethod\SingleToManyMethodRector\Source\OneToManyInterface::class, 'getNode', 'getNodes')])]]);
};
