<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210413;

use Rector\Nette\Kdyby\Rector\ClassMethod\ChangeNetteEventNamesInGetSubscribedEventsRector;
use Rector\Nette\Kdyby\Rector\ClassMethod\ReplaceMagicPropertyWithEventClassRector;
use Rector\Nette\Kdyby\Rector\MethodCall\ReplaceEventManagerWithEventSubscriberRector;
use Rector\Nette\Kdyby\Rector\MethodCall\ReplaceMagicPropertyEventWithEventClassRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Typo3RectorPrefix20210413\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210413\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Nette\Kdyby\Rector\ClassMethod\ChangeNetteEventNamesInGetSubscribedEventsRector::class);
    $services->set(\Rector\Nette\Kdyby\Rector\MethodCall\ReplaceMagicPropertyEventWithEventClassRector::class);
    $services->set(\Rector\Nette\Kdyby\Rector\ClassMethod\ReplaceMagicPropertyWithEventClassRector::class);
    $services->set(\Rector\Nette\Kdyby\Rector\MethodCall\ReplaceEventManagerWithEventSubscriberRector::class);
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => ['Typo3RectorPrefix20210413\\Kdyby\\Events\\Subscriber' => 'Typo3RectorPrefix20210413\\Symfony\\Component\\EventDispatcher\\EventSubscriberInterface', 'Typo3RectorPrefix20210413\\Kdyby\\Events\\EventManager' => 'Typo3RectorPrefix20210413\\Symfony\\Contracts\\EventDispatcher\\EventDispatcherInterface']]]);
};
