<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210410;

use Rector\Renaming\Rector\Name\RenameClassRector;
use Typo3RectorPrefix20210410\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210410\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => ['old_2' => 'new_2']]])->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => ['old_4' => 'new_4']]]);
    $containerConfigurator->import(__DIR__ . '/first_config.php');
    $containerConfigurator->import(__DIR__ . '/second_config.php');
};
