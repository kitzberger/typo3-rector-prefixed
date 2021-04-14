<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210414;

use Rector\Core\Configuration\Option;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Typo3RectorPrefix20210414\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210414\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::AUTO_IMPORT_NAMES, \true);
    $parameters->set(\Rector\Core\Configuration\Option::IMPORT_DOC_BLOCKS, \true);
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class);
};
