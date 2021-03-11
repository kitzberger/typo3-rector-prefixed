<?php

namespace Typo3RectorPrefix20210311;

use Rector\Transform\Rector\String_\StringToClassConstantRector;
use Rector\Transform\ValueObject\StringToClassConstant;
use Typo3RectorPrefix20210311\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210311\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\String_\StringToClassConstantRector::class)->call('configure', [[\Rector\Transform\Rector\String_\StringToClassConstantRector::STRINGS_TO_CLASS_CONSTANTS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\StringToClassConstant('compiler.post_dump', 'Typo3RectorPrefix20210311\\Yet\\AnotherClass', 'CONSTANT'), new \Rector\Transform\ValueObject\StringToClassConstant('compiler.to_class', 'Typo3RectorPrefix20210311\\Yet\\AnotherClass', 'class')])]]);
};
