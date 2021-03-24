<?php

namespace Typo3RectorPrefix20210324;

use Typo3RectorPrefix20210324\Acme\Bar\DoNotUpdateExistingTargetNamespace;
use Typo3RectorPrefix20210324\Manual\Twig\TwigFilter;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\Tests\Rector\Name\RenameClassRector\Fixture\DuplicatedClass;
use Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\AbstractManualExtension;
use Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\Contract\FirstInterface;
use Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\Contract\SecondInterface;
use Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\Contract\ThirdInterface;
use Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\NewClass;
use Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\NewClassWithoutTypo;
use Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\OldClass;
use Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\OldClassWithTypo;
use Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\SomeFinalClass;
use Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\SomeNonFinalClass;
use Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => [
        'FqnizeNamespaced' => 'Typo3RectorPrefix20210324\\Abc\\FqnizeNamespaced',
        \Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\OldClass::class => \Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\NewClass::class,
        \Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\OldClassWithTypo::class => \Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\NewClassWithoutTypo::class,
        'DateTime' => 'DateTimeInterface',
        'Countable' => 'stdClass',
        \Typo3RectorPrefix20210324\Manual_Twig_Filter::class => \Typo3RectorPrefix20210324\Manual\Twig\TwigFilter::class,
        'Twig_AbstractManualExtension' => \Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\AbstractManualExtension::class,
        'Twig_Extension_Sandbox' => 'Typo3RectorPrefix20210324\\Twig\\Extension\\SandboxExtension',
        // Renaming class itself and its namespace
        'Typo3RectorPrefix20210324\\MyNamespace\\MyClass' => 'Typo3RectorPrefix20210324\\MyNewNamespace\\MyNewClass',
        'Typo3RectorPrefix20210324\\MyNamespace\\MyTrait' => 'Typo3RectorPrefix20210324\\MyNewNamespace\\MyNewTrait',
        'Typo3RectorPrefix20210324\\MyNamespace\\MyInterface' => 'Typo3RectorPrefix20210324\\MyNewNamespace\\MyNewInterface',
        'MyOldClass' => 'Typo3RectorPrefix20210324\\MyNamespace\\MyNewClass',
        'AnotherMyOldClass' => 'AnotherMyNewClass',
        'Typo3RectorPrefix20210324\\MyNamespace\\AnotherMyClass' => 'MyNewClassWithoutNamespace',
        // test duplicated class - @see https://github.com/rectorphp/rector/issues/1438
        'Rector\\Renaming\\Tests\\Rector\\Name\\RenameClassRector\\Fixture\\SingularClass' => \Rector\Renaming\Tests\Rector\Name\RenameClassRector\Fixture\DuplicatedClass::class,
        // test duplicated class - @see https://github.com/rectorphp/rector/issues/5389
        \Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\Contract\FirstInterface::class => \Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\Contract\ThirdInterface::class,
        \Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\Contract\SecondInterface::class => \Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\Contract\ThirdInterface::class,
        \Typo3RectorPrefix20210324\Acme\Foo\DoNotUpdateExistingTargetNamespace::class => \Typo3RectorPrefix20210324\Acme\Bar\DoNotUpdateExistingTargetNamespace::class,
        \Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\SomeNonFinalClass::class => \Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\SomeFinalClass::class,
    ]]]);
};
