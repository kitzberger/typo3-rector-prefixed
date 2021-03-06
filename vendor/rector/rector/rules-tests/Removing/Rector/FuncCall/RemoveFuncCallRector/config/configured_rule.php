<?php

namespace Typo3RectorPrefix20210423;

use Rector\Removing\Rector\FuncCall\RemoveFuncCallRector;
use Rector\Removing\ValueObject\RemoveFuncCall;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Removing\Rector\FuncCall\RemoveFuncCallRector::class)->call('configure', [[\Rector\Removing\Rector\FuncCall\RemoveFuncCallRector::REMOVE_FUNC_CALLS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Removing\ValueObject\RemoveFuncCall('ini_get', [0 => ['y2k_compliance', 'safe_mode', 'magic_quotes_runtime']]), new \Rector\Removing\ValueObject\RemoveFuncCall('ini_set', [0 => ['y2k_compliance', 'safe_mode', 'magic_quotes_runtime']])])]]);
};
