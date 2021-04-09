<?php

namespace Typo3RectorPrefix20210409;

use Typo3RectorPrefix20210409\Nette\Utils\Html;
use Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector;
use Rector\Renaming\ValueObject\RenameStaticMethod;
use Rector\Tests\Renaming\Rector\StaticCall\RenameStaticMethodRector\Source\FormMacros;
use Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector::OLD_TO_NEW_METHODS_BY_CLASSES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\RenameStaticMethod(\Typo3RectorPrefix20210409\Nette\Utils\Html::class, 'add', \Typo3RectorPrefix20210409\Nette\Utils\Html::class, 'addHtml'), new \Rector\Renaming\ValueObject\RenameStaticMethod(\Rector\Tests\Renaming\Rector\StaticCall\RenameStaticMethodRector\Source\FormMacros::class, 'renderFormBegin', 'Typo3RectorPrefix20210409\\Nette\\Bridges\\FormsLatte\\Runtime', 'renderFormBegin')])]]);
};
