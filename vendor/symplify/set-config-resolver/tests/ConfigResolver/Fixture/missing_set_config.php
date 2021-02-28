<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210228;

use Typo3RectorPrefix20210228\PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use Typo3RectorPrefix20210228\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210228\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set('sets', ['not_here']);
    $services = $containerConfigurator->services();
    $services->set(\Typo3RectorPrefix20210228\PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer::class)->call('configure', [['syntax' => 'short']]);
};
