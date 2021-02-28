<?php

namespace Typo3RectorPrefix20210228;

use Typo3RectorPrefix20210228\Nette\Utils\Html;
use Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector;
use Rector\Renaming\Tests\Rector\StaticCall\RenameStaticMethodRector\Source\FormMacros;
use Rector\Renaming\ValueObject\RenameStaticMethod;
use Typo3RectorPrefix20210228\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210228\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector::OLD_TO_NEW_METHODS_BY_CLASSES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\RenameStaticMethod(\Typo3RectorPrefix20210228\Nette\Utils\Html::class, 'add', \Typo3RectorPrefix20210228\Nette\Utils\Html::class, 'addHtml'), new \Rector\Renaming\ValueObject\RenameStaticMethod(\Rector\Renaming\Tests\Rector\StaticCall\RenameStaticMethodRector\Source\FormMacros::class, 'renderFormBegin', 'Typo3RectorPrefix20210228\\Nette\\Bridges\\FormsLatte\\Runtime', 'renderFormBegin')])]]);
};
