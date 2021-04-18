<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210418;

use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersion;
use Typo3RectorPrefix20210418\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Ssch\TYPO3Rector\Set\Typo3SetList;
return static function (\Typo3RectorPrefix20210418\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    // get parameters
    $parameters = $containerConfigurator->parameters();
    $containerConfigurator->import(\Ssch\TYPO3Rector\Set\Typo3SetList::TYPO3_76);
    $containerConfigurator->import(\Ssch\TYPO3Rector\Set\Typo3SetList::TYPO3_87);
    $containerConfigurator->import(\Ssch\TYPO3Rector\Set\Typo3SetList::TYPO3_95);
    $containerConfigurator->import(\Ssch\TYPO3Rector\Set\Typo3SetList::TYPO3_104);
    $containerConfigurator->import(\Ssch\TYPO3Rector\Set\Typo3SetList::TYPO3_11);
    // Define your target version which you want to support
    $parameters->set(\Rector\Core\Configuration\Option::PHP_VERSION_FEATURES, \Rector\Core\ValueObject\PhpVersion::PHP_72);
};
