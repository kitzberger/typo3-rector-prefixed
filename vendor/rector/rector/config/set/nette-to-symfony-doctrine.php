<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210329;

use Rector\Renaming\Rector\Name\RenameClassRector;
use Typo3RectorPrefix20210329\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210329\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => ['Typo3RectorPrefix20210329\\Doctrine\\Common\\DataFixtures\\AbstractFixture' => 'Typo3RectorPrefix20210329\\Doctrine\\Bundle\\FixturesBundle\\Fixture']]]);
};
