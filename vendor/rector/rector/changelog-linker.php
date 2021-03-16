<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210316;

use Typo3RectorPrefix20210316\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Typo3RectorPrefix20210316\Symplify\ChangelogLinker\ValueObject\Option;
return static function (\Typo3RectorPrefix20210316\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Typo3RectorPrefix20210316\Symplify\ChangelogLinker\ValueObject\Option::AUTHORS_TO_IGNORE, ['TomasVotruba']);
};
