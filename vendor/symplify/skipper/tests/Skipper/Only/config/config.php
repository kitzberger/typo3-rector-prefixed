<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210228;

use Typo3RectorPrefix20210228\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Typo3RectorPrefix20210228\Symplify\Skipper\Tests\Skipper\Only\Source\IncludeThisClass;
use Typo3RectorPrefix20210228\Symplify\Skipper\Tests\Skipper\Only\Source\SkipCompletely;
use Typo3RectorPrefix20210228\Symplify\Skipper\Tests\Skipper\Only\Source\SkipCompletelyToo;
use Typo3RectorPrefix20210228\Symplify\Skipper\ValueObject\Option;
return static function (\Typo3RectorPrefix20210228\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Typo3RectorPrefix20210228\Symplify\Skipper\ValueObject\Option::ONLY, [
        \Typo3RectorPrefix20210228\Symplify\Skipper\Tests\Skipper\Only\Source\IncludeThisClass::class => ['SomeFileToOnlyInclude.php'],
        // these 2 lines should be identical
        \Typo3RectorPrefix20210228\Symplify\Skipper\Tests\Skipper\Only\Source\SkipCompletely::class => null,
        \Typo3RectorPrefix20210228\Symplify\Skipper\Tests\Skipper\Only\Source\SkipCompletelyToo::class,
    ]);
};
