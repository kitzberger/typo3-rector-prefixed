<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210329;

use Rector\Core\Configuration\Option;
use Rector\Set\ValueObject\DowngradeSetList;
use Typo3RectorPrefix20210329\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
require_once __DIR__ . '/configuration.php';
return static function (\Typo3RectorPrefix20210329\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::SKIP, \Typo3RectorPrefix20210329\DowngradeRectorConfig::RECTOR_EXCLUDE_PATHS);
    $parameters->set(\Rector\Core\Configuration\Option::SETS, [\Rector\Set\ValueObject\DowngradeSetList::PHP_72]);
};
