<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420;

use Rector\Renaming\Rector\Name\RenameClassRector;
use Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210420\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => [
        # swiftmailer 60
        'Swift_Mime_Message' => 'Swift_Mime_SimpleMessage',
    ]]]);
};
