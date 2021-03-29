<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210329;

use Rector\Renaming\Rector\Name\RenameClassRector;
use Typo3RectorPrefix20210329\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210329\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => ['Typo3RectorPrefix20210329\\Kdyby\\Translation\\Translator' => 'Typo3RectorPrefix20210329\\Nette\\Localization\\ITranslator', 'Typo3RectorPrefix20210329\\Kdyby\\Translation\\DI\\ITranslationProvider' => 'Typo3RectorPrefix20210329\\Contributte\\Translation\\DI\\TranslationProviderInterface', 'Typo3RectorPrefix20210329\\Kdyby\\Translation\\Phrase' => 'Typo3RectorPrefix20210329\\Contributte\\Translation\\Wrappers\\Message']]]);
};
