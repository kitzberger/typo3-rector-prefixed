<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210318;

use Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Typo3RectorPrefix20210318\Symplify\Skipper\Tests\Skipper\Skip\Source\AnotherClassToSkip;
use Typo3RectorPrefix20210318\Symplify\Skipper\Tests\Skipper\Skip\Source\SomeClassToSkip;
use Typo3RectorPrefix20210318\Symplify\Skipper\ValueObject\Option;
return static function (\Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Typo3RectorPrefix20210318\Symplify\Skipper\ValueObject\Option::SKIP, [
        // classes
        \Typo3RectorPrefix20210318\Symplify\Skipper\Tests\Skipper\Skip\Source\SomeClassToSkip::class,
        \Typo3RectorPrefix20210318\Symplify\Skipper\Tests\Skipper\Skip\Source\AnotherClassToSkip::class => ['Fixture/someFile', '*/someDirectory/*'],
        // code
        \Typo3RectorPrefix20210318\Symplify\Skipper\Tests\Skipper\Skip\Source\AnotherClassToSkip::class . '.someCode' => null,
        \Typo3RectorPrefix20210318\Symplify\Skipper\Tests\Skipper\Skip\Source\AnotherClassToSkip::class . '.someOtherCode' => ['*/someDirectory/*'],
        \Typo3RectorPrefix20210318\Symplify\Skipper\Tests\Skipper\Skip\Source\AnotherClassToSkip::class . '.someAnotherCode' => ['someDirectory/*'],
        // file paths
        __DIR__ . '/../Fixture/AlwaysSkippedPath',
        '*\\PathSkippedWithMask\\*',
        // messages
        'some fishy code at line 5!' => null,
        'some another fishy code at line 5!' => ['someDirectory/*'],
        'Cognitive complexity for method "foo" is 2 but has to be less than or equal to 1.' => null,
    ]);
};
