<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210330;

use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersion;
use Typo3RectorPrefix20210330\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Ssch\TYPO3Rector\Set\Typo3SetList;
return static function (\Typo3RectorPrefix20210330\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    // get parameters
    $parameters = $containerConfigurator->parameters();
    // Define what rule sets will be applied
    $parameters->set(\Rector\Core\Configuration\Option::SETS, [\Ssch\TYPO3Rector\Set\Typo3SetList::TYPO3_76, \Ssch\TYPO3Rector\Set\Typo3SetList::TYPO3_87, \Ssch\TYPO3Rector\Set\Typo3SetList::TYPO3_95, \Ssch\TYPO3Rector\Set\Typo3SetList::TYPO3_104, \Ssch\TYPO3Rector\Set\Typo3SetList::TYPO3_11]);
    // Define your target version which you want to support
    $parameters->set(\Rector\Core\Configuration\Option::PHP_VERSION_FEATURES, \Rector\Core\ValueObject\PhpVersion::PHP_72);
};
