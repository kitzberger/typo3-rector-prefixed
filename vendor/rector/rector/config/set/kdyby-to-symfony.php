<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210414;

use Rector\Core\ValueObject\Visibility;
use Rector\NetteToSymfony\Rector\MethodCall\WrapTransParameterNameRector;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Visibility\Rector\ClassMethod\ChangeMethodVisibilityRector;
use Rector\Visibility\ValueObject\ChangeMethodVisibility;
use Typo3RectorPrefix20210414\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210414\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Visibility\Rector\ClassMethod\ChangeMethodVisibilityRector::class)->call('configure', [[\Rector\Visibility\Rector\ClassMethod\ChangeMethodVisibilityRector::METHOD_VISIBILITIES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Visibility\ValueObject\ChangeMethodVisibility('Typo3RectorPrefix20210414\\Kdyby\\Events\\Subscriber', 'getSubscribedEvents', \Rector\Core\ValueObject\Visibility::STATIC)])]]);
    $services->set(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210414\\Kdyby\\Translation\\Translator', 'translate', 'trans'), new \Rector\Renaming\ValueObject\MethodCallRename('Typo3RectorPrefix20210414\\Kdyby\\RabbitMq\\IConsumer', 'process', 'execute')])]]);
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => ['Typo3RectorPrefix20210414\\Kdyby\\RabbitMq\\IConsumer' => 'Typo3RectorPrefix20210414\\OldSound\\RabbitMqBundle\\RabbitMq\\ConsumerInterface', 'Typo3RectorPrefix20210414\\Kdyby\\RabbitMq\\IProducer' => 'Typo3RectorPrefix20210414\\OldSound\\RabbitMqBundle\\RabbitMq\\ProducerInterface', 'Typo3RectorPrefix20210414\\Kdyby\\Monolog\\Logger' => 'Psr\\Log\\LoggerInterface', 'Typo3RectorPrefix20210414\\Kdyby\\Events\\Subscriber' => 'Typo3RectorPrefix20210414\\Symfony\\Component\\EventDispatcher\\EventSubscriberInterface', 'Typo3RectorPrefix20210414\\Kdyby\\Translation\\Translator' => 'Typo3RectorPrefix20210414\\Symfony\\Contracts\\Translation\\TranslatorInterface']]]);
    $services->set(\Rector\NetteToSymfony\Rector\MethodCall\WrapTransParameterNameRector::class);
};
