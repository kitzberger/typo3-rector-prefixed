<?php

namespace Typo3RectorPrefix20210412;

use Rector\Renaming\Rector\PropertyFetch\RenamePropertyRector;
use Rector\Renaming\ValueObject\RenameProperty;
use Rector\Tests\Renaming\Rector\PropertyFetch\RenamePropertyRector\Source\ClassWithProperties;
use Typo3RectorPrefix20210412\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210412\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\PropertyFetch\RenamePropertyRector::class)->call('configure', [[\Rector\Renaming\Rector\PropertyFetch\RenamePropertyRector::RENAMED_PROPERTIES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\RenameProperty(\Rector\Tests\Renaming\Rector\PropertyFetch\RenamePropertyRector\Source\ClassWithProperties::class, 'oldProperty', 'newProperty'), new \Rector\Renaming\ValueObject\RenameProperty(\Rector\Tests\Renaming\Rector\PropertyFetch\RenamePropertyRector\Source\ClassWithProperties::class, 'anotherOldProperty', 'anotherNewProperty')])]]);
};
