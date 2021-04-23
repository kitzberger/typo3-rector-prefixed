<?php

namespace Typo3RectorPrefix20210423;

use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\NewClass;
use Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\OldClass;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => [
        \Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\OldClass::class => \Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\NewClass::class,
        // Laravel
        'Session' => 'Illuminate\\Support\\Facades\\Session',
        'Form' => 'Collective\\Html\\FormFacade',
        'Html' => 'Collective\\Html\\HtmlFacade',
    ]]]);
};
