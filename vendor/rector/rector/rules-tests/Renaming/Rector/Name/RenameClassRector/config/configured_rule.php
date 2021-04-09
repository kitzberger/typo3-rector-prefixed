<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210409;

use Typo3RectorPrefix20210409\Acme\Bar\DoNotUpdateExistingTargetNamespace;
use Typo3RectorPrefix20210409\Manual\Twig\TwigFilter;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Tests\Renaming\Rector\Name\RenameClassRector\Fixture\DuplicatedClass;
use Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\AbstractManualExtension;
use Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\Contract\FirstInterface;
use Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\Contract\SecondInterface;
use Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\Contract\ThirdInterface;
use Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\NewClass;
use Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\NewClassWithoutTypo;
use Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\OldClass;
use Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\OldClassWithTypo;
use Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\SomeFinalClass;
use Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\SomeNonFinalClass;
use Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => [
        'FqnizeNamespaced' => 'Typo3RectorPrefix20210409\\Abc\\FqnizeNamespaced',
        \Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\OldClass::class => \Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\NewClass::class,
        \Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\OldClassWithTypo::class => \Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\NewClassWithoutTypo::class,
        'DateTime' => 'DateTimeInterface',
        'Countable' => 'stdClass',
        \Typo3RectorPrefix20210409\Manual_Twig_Filter::class => \Typo3RectorPrefix20210409\Manual\Twig\TwigFilter::class,
        'Twig_AbstractManualExtension' => \Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\AbstractManualExtension::class,
        'Twig_Extension_Sandbox' => 'Typo3RectorPrefix20210409\\Twig\\Extension\\SandboxExtension',
        // Renaming class itself and its namespace
        'Typo3RectorPrefix20210409\\MyNamespace\\MyClass' => 'Typo3RectorPrefix20210409\\MyNewNamespace\\MyNewClass',
        'Typo3RectorPrefix20210409\\MyNamespace\\MyTrait' => 'Typo3RectorPrefix20210409\\MyNewNamespace\\MyNewTrait',
        'Typo3RectorPrefix20210409\\MyNamespace\\MyInterface' => 'Typo3RectorPrefix20210409\\MyNewNamespace\\MyNewInterface',
        'MyOldClass' => 'Typo3RectorPrefix20210409\\MyNamespace\\MyNewClass',
        'AnotherMyOldClass' => 'AnotherMyNewClass',
        'Typo3RectorPrefix20210409\\MyNamespace\\AnotherMyClass' => 'MyNewClassWithoutNamespace',
        // test duplicated class - @see https://github.com/rectorphp/rector/issues/1438
        'Rector\\Tests\\Renaming\\Rector\\Name\\RenameClassRector\\Fixture\\SingularClass' => \Rector\Tests\Renaming\Rector\Name\RenameClassRector\Fixture\DuplicatedClass::class,
        // test duplicated class - @see https://github.com/rectorphp/rector/issues/5389
        \Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\Contract\FirstInterface::class => \Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\Contract\ThirdInterface::class,
        \Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\Contract\SecondInterface::class => \Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\Contract\ThirdInterface::class,
        \Typo3RectorPrefix20210409\Acme\Foo\DoNotUpdateExistingTargetNamespace::class => \Typo3RectorPrefix20210409\Acme\Bar\DoNotUpdateExistingTargetNamespace::class,
        \Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\SomeNonFinalClass::class => \Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\SomeFinalClass::class,
    ]]]);
};