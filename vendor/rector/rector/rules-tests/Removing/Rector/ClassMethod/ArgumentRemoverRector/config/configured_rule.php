<?php

namespace Typo3RectorPrefix20210423;

use Rector\Removing\Rector\ClassMethod\ArgumentRemoverRector;
use Rector\Removing\ValueObject\ArgumentRemover;
use Rector\Tests\Removing\Rector\ClassMethod\ArgumentRemoverRector\Source\Persister;
use Rector\Tests\Removing\Rector\ClassMethod\ArgumentRemoverRector\Source\RemoveInTheMiddle;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Typo3RectorPrefix20210423\Symfony\Component\Yaml\Yaml;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Removing\Rector\ClassMethod\ArgumentRemoverRector::class)->call('configure', [[\Rector\Removing\Rector\ClassMethod\ArgumentRemoverRector::REMOVED_ARGUMENTS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Removing\ValueObject\ArgumentRemover(\Rector\Tests\Removing\Rector\ClassMethod\ArgumentRemoverRector\Source\Persister::class, 'getSelectJoinColumnSQL', 4, null), new \Rector\Removing\ValueObject\ArgumentRemover(\Typo3RectorPrefix20210423\Symfony\Component\Yaml\Yaml::class, 'parse', 1, ['Symfony\\Component\\Yaml\\Yaml::PARSE_KEYS_AS_STRINGS', 'hey', 55, 5.5]), new \Rector\Removing\ValueObject\ArgumentRemover(\Rector\Tests\Removing\Rector\ClassMethod\ArgumentRemoverRector\Source\RemoveInTheMiddle::class, 'run', 1, ['name' => 'second'])])]]);
};
