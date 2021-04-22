<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Renaming\ValueObject\MethodCallRenameWithArrayKey;
use Rector\Tests\Renaming\Rector\MethodCall\RenameMethodRector\Source\AbstractType;
use Typo3RectorPrefix20210422\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210422\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([
        new \Rector\Renaming\ValueObject\MethodCallRename(\Rector\Tests\Renaming\Rector\MethodCall\RenameMethodRector\Source\AbstractType::class, 'setDefaultOptions', 'configureOptions'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Nette\\Utils\\Html', 'add', 'addHtml'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Rector\\Tests\\Renaming\\Rector\\MethodCall\\RenameMethodRector\\Fixture\\DemoFile', 'notify', '__invoke'),
        new \Rector\Renaming\ValueObject\MethodCallRename('Rector\\Tests\\Renaming\\Rector\\MethodCall\\RenameMethodRector\\Fixture\\SomeSubscriber', 'old', 'new'),
        // with array key
        new \Rector\Renaming\ValueObject\MethodCallRenameWithArrayKey('Nette\\Utils\\Html', 'addToArray', 'addToHtmlArray', 'hey'),
    ])]]);
};
