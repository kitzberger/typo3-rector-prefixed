<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210414;

use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Symfony\Set\SymfonySetList;
use Typo3RectorPrefix20210414\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
// route class must exist and be loaded, as annotation parser uses dynamic reflection
require_once __DIR__ . '/../stubs/Symfony/Component/Routing/Annotation/Route.php';
return static function (\Typo3RectorPrefix20210414\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(\Rector\Symfony\Set\SymfonySetList::SYMFONY_52);
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::PHP_VERSION_FEATURES, \Rector\Core\ValueObject\PhpVersion::PHP_80);
};
