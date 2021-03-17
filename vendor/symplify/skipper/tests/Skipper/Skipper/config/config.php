<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210317;

use Typo3RectorPrefix20210317\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Typo3RectorPrefix20210317\Symplify\Skipper\Tests\Skipper\Skipper\Fixture\Element\FifthElement;
use Typo3RectorPrefix20210317\Symplify\Skipper\Tests\Skipper\Skipper\Fixture\Element\SixthSense;
use Typo3RectorPrefix20210317\Symplify\Skipper\ValueObject\Option;
return static function (\Typo3RectorPrefix20210317\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Typo3RectorPrefix20210317\Symplify\Skipper\ValueObject\Option::SKIP, [
        // windows like path
        '*\\SomeSkipped\\*',
        // elements
        \Typo3RectorPrefix20210317\Symplify\Skipper\Tests\Skipper\Skipper\Fixture\Element\FifthElement::class,
        \Typo3RectorPrefix20210317\Symplify\Skipper\Tests\Skipper\Skipper\Fixture\Element\SixthSense::class,
    ]);
};
