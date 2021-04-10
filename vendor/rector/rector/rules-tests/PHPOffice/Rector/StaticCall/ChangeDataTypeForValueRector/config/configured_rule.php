<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210410;

use Rector\PHPOffice\Rector\StaticCall\ChangeDataTypeForValueRector;
use Typo3RectorPrefix20210410\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210410\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\PHPOffice\Rector\StaticCall\ChangeDataTypeForValueRector::class);
};
