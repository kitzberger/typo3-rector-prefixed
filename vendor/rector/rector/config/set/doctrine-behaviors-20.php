<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210402;

use Rector\Doctrine\Rector\Class_\AddEntityIdByConditionRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Transform\Rector\Class_\AddInterfaceByTraitRector;
use Typo3RectorPrefix20210402\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210402\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\Class_\AddInterfaceByTraitRector::class)->call('configure', [[\Rector\Transform\Rector\Class_\AddInterfaceByTraitRector::INTERFACE_BY_TRAIT => ['Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Timestampable\\Timestampable' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Contract\\Entity\\TimestampableInterface', 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Timestampable\\TimestampableMethods' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Contract\\Entity\\TimestampableInterface', 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Blameable\\Blameable' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Contract\\Entity\\BlameableInterface', 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Blameable\\BlameableMethods' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Contract\\Entity\\BlameableInterface', 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Loggable\\Loggable' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Contract\\Entity\\LoggableInterface', 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\SoftDeletable\\SoftDeletable' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Contract\\Entity\\SoftDeletableInterface', 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\SoftDeletable\\SoftDeletableMethodsTrait' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Contract\\Entity\\SoftDeletableInterface', 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Translatable\\Translatable' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Contract\\Entity\\TranslatableInterface', 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Translatable\\TranslatableMethods' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Contract\\Entity\\TranslatableInterface', 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Translatable\\Translation' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Contract\\Entity\\TranslationInterface', 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Translatable\\TranslationMethods' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Contract\\Entity\\TranslationInterface', 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Uuidable\\Uuidable' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Contract\\Entity\\UuidableInterface', 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Uuidable\\UuidableMethods' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Contract\\Entity\\UuidableInterface']]]);
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => [
        # move interface to "Contract"
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Tree\\NodeInterface' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Contract\\Entity\\TreeNodeInterface',
        # suffix "Trait" for traits
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Blameable\\BlameableMethods' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Blameable\\BlameableMethodsTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Blameable\\BlameableProperties' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Blameable\\BlameablePropertiesTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Blameable\\Blameable' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Blameable\\BlameableTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Geocodable\\GeocodableMethods' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Geocodable\\GeocodableMethodsTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Geocodable\\GeocodableProperties' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Geocodable\\GeocodablePropertiesTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Geocodable\\Geocodable' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Geocodable\\GeocodableTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Loggable\\Loggable' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Loggable\\LoggableTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Sluggable\\SluggableMethods' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Sluggable\\SluggableMethodsTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Sluggable\\SluggableProperties' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Sluggable\\SluggablePropertiesTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Sluggable\\Sluggable' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Sluggable\\SluggableTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\SoftDeletable\\SoftDeletableMethods' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\SoftDeletable\\SoftDeletableMethodsTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\SoftDeletable\\SoftDeletableProperties' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\SoftDeletable\\SoftDeletablePropertiesTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\SoftDeletable\\SoftDeletable' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\SoftDeletable\\SoftDeletableTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Timestampable\\TimestampableMethods' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Timestampable\\TimestampableMethodsTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Timestampable\\TimestampableProperties' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Timestampable\\TimestampablePropertiesTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Timestampable\\Timestampable' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Timestampable\\TimestampableTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Translatable\\TranslatableMethods' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Translatable\\TranslatableMethodsTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Translatable\\TranslatableProperties' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Translatable\\TranslatablePropertiesTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Translatable\\Translatable' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Translatable\\TranslatableTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Translatable\\TranslationMethods' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Translatable\\TranslationMethodsTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Translatable\\TranslationProperties' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Translatable\\TranslationPropertiesTrait',
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Translatable\\Translation' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Translatable\\TranslationTrait',
        # tree
        'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Tree\\Node' => 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Tree\\TreeNodeTrait',
    ]]]);
    $services->set(\Rector\Doctrine\Rector\Class_\AddEntityIdByConditionRector::class)->call('configure', [[\Rector\Doctrine\Rector\Class_\AddEntityIdByConditionRector::DETECTED_TRAITS => ['Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Translatable\\Translation', 'Typo3RectorPrefix20210402\\Knp\\DoctrineBehaviors\\Model\\Translatable\\TranslationTrait']]]);
};
