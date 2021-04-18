<?php

namespace Typo3RectorPrefix20210418;

use Rector\Core\ValueObject\Visibility;
use Rector\Tests\Visibility\Rector\Property\ChangePropertyVisibilityRector\Source\ParentObject;
use Rector\Visibility\Rector\Property\ChangePropertyVisibilityRector;
use Typo3RectorPrefix20210418\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210418\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Visibility\Rector\Property\ChangePropertyVisibilityRector::class)->call('configure', [[\Rector\Visibility\Rector\Property\ChangePropertyVisibilityRector::PROPERTY_TO_VISIBILITY_BY_CLASS => [\Rector\Tests\Visibility\Rector\Property\ChangePropertyVisibilityRector\Source\ParentObject::class => ['toBePublicProperty' => \Rector\Core\ValueObject\Visibility::PUBLIC, 'toBeProtectedProperty' => \Rector\Core\ValueObject\Visibility::PROTECTED, 'toBePrivateProperty' => \Rector\Core\ValueObject\Visibility::PRIVATE, 'toBePublicStaticProperty' => \Rector\Core\ValueObject\Visibility::PUBLIC], 'Rector\\Tests\\Visibility\\Rector\\Property\\ChangePropertyVisibilityRector\\Fixture\\Fixture3' => ['toBePublicStaticProperty' => \Rector\Core\ValueObject\Visibility::PUBLIC]]]]);
};
