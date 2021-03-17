<?php

namespace Typo3RectorPrefix20210317;

use Rector\Arguments\Rector\FuncCall\SwapFuncCallArgumentsRector;
use Rector\Arguments\ValueObject\SwapFuncCallArguments;
use Typo3RectorPrefix20210317\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210317\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Arguments\Rector\FuncCall\SwapFuncCallArgumentsRector::class)->call('configure', [[\Rector\Arguments\Rector\FuncCall\SwapFuncCallArgumentsRector::FUNCTION_ARGUMENT_SWAPS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Arguments\ValueObject\SwapFuncCallArguments('some_function', [1, 0])])]]);
};
