<?php

namespace Typo3RectorPrefix20210423;

use Rector\Tests\Transform\Rector\Class_\ParentClassToTraitsRector\Source\AnotherParentObject;
use Rector\Tests\Transform\Rector\Class_\ParentClassToTraitsRector\Source\ParentObject;
use Rector\Tests\Transform\Rector\Class_\ParentClassToTraitsRector\Source\SecondTrait;
use Rector\Tests\Transform\Rector\Class_\ParentClassToTraitsRector\Source\SomeTrait;
use Rector\Transform\Rector\Class_\ParentClassToTraitsRector;
use Rector\Transform\ValueObject\ParentClassToTraits;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\Class_\ParentClassToTraitsRector::class)->call('configure', [[\Rector\Transform\Rector\Class_\ParentClassToTraitsRector::PARENT_CLASS_TO_TRAITS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\ParentClassToTraits(\Rector\Tests\Transform\Rector\Class_\ParentClassToTraitsRector\Source\ParentObject::class, [\Rector\Tests\Transform\Rector\Class_\ParentClassToTraitsRector\Source\SomeTrait::class]), new \Rector\Transform\ValueObject\ParentClassToTraits(\Rector\Tests\Transform\Rector\Class_\ParentClassToTraitsRector\Source\AnotherParentObject::class, [\Rector\Tests\Transform\Rector\Class_\ParentClassToTraitsRector\Source\SomeTrait::class, \Rector\Tests\Transform\Rector\Class_\ParentClassToTraitsRector\Source\SecondTrait::class])])]]);
};
