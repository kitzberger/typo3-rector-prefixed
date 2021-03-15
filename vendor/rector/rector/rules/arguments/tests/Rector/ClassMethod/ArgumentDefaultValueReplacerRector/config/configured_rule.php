<?php

namespace Typo3RectorPrefix20210315;

use Rector\Arguments\Rector\ClassMethod\ArgumentDefaultValueReplacerRector;
use Rector\Arguments\ValueObject\ArgumentDefaultValueReplacer;
use Typo3RectorPrefix20210315\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210315\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Arguments\Rector\ClassMethod\ArgumentDefaultValueReplacerRector::class)->call('configure', [[\Rector\Arguments\Rector\ClassMethod\ArgumentDefaultValueReplacerRector::REPLACED_ARGUMENTS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Arguments\ValueObject\ArgumentDefaultValueReplacer('Typo3RectorPrefix20210315\\Symfony\\Component\\DependencyInjection\\Definition', 'setScope', 0, 'Symfony\\Component\\DependencyInjection\\ContainerBuilder::SCOPE_PROTOTYPE', \false), new \Rector\Arguments\ValueObject\ArgumentDefaultValueReplacer('Typo3RectorPrefix20210315\\Symfony\\Component\\Yaml\\Yaml', 'parse', 1, [\false, \false, \true], 'Symfony\\Component\\Yaml\\Yaml::PARSE_OBJECT_FOR_MAP'), new \Rector\Arguments\ValueObject\ArgumentDefaultValueReplacer('Typo3RectorPrefix20210315\\Symfony\\Component\\Yaml\\Yaml', 'parse', 1, [\false, \true], 'Symfony\\Component\\Yaml\\Yaml::PARSE_OBJECT'), new \Rector\Arguments\ValueObject\ArgumentDefaultValueReplacer('Typo3RectorPrefix20210315\\Symfony\\Component\\Yaml\\Yaml', 'parse', 1, \false, 0), new \Rector\Arguments\ValueObject\ArgumentDefaultValueReplacer('Typo3RectorPrefix20210315\\Symfony\\Component\\Yaml\\Yaml', 'parse', 1, \true, 'Symfony\\Component\\Yaml\\Yaml::PARSE_EXCEPTION_ON_INVALID_TYPE'), new \Rector\Arguments\ValueObject\ArgumentDefaultValueReplacer('Typo3RectorPrefix20210315\\Symfony\\Component\\Yaml\\Yaml', 'dump', 3, [\false, \true], 'Symfony\\Component\\Yaml\\Yaml::DUMP_OBJECT'), new \Rector\Arguments\ValueObject\ArgumentDefaultValueReplacer('Typo3RectorPrefix20210315\\Symfony\\Component\\Yaml\\Yaml', 'dump', 3, \true, 'Symfony\\Component\\Yaml\\Yaml::DUMP_EXCEPTION_ON_INVALID_TYPE')])]]);
};
