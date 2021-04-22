<?php

namespace Typo3RectorPrefix20210422;

use Typo3RectorPrefix20210422\PhpCsFixer\Fixer\Phpdoc\GeneralPhpdocAnnotationRemoveFixer;
use Typo3RectorPrefix20210422\PhpCsFixer\Fixer\Phpdoc\NoSuperfluousPhpdocTagsFixer;
use Typo3RectorPrefix20210422\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Typo3RectorPrefix20210422\Symplify\EasyCodingStandard\ValueObject\Option;
use Typo3RectorPrefix20210422\Symplify\EasyCodingStandard\ValueObject\Set\SetList;
return static function (\Typo3RectorPrefix20210422\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Typo3RectorPrefix20210422\PhpCsFixer\Fixer\Phpdoc\GeneralPhpdocAnnotationRemoveFixer::class)->call('configure', [['annotations' => ['throws', 'author', 'package', 'group', 'required', 'phpstan-ignore-line', 'phpstan-ignore-next-line']]]);
    $services->set(\Typo3RectorPrefix20210422\PhpCsFixer\Fixer\Phpdoc\NoSuperfluousPhpdocTagsFixer::class)->call('configure', [['allow_mixed' => \true]]);
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Typo3RectorPrefix20210422\Symplify\EasyCodingStandard\ValueObject\Option::PATHS, [__DIR__ . '/src', __DIR__ . '/tests']);
    $parameters->set(\Typo3RectorPrefix20210422\Symplify\EasyCodingStandard\ValueObject\Option::SETS, [\Typo3RectorPrefix20210422\Symplify\EasyCodingStandard\ValueObject\Set\SetList::PSR_12, \Typo3RectorPrefix20210422\Symplify\EasyCodingStandard\ValueObject\Set\SetList::SYMPLIFY, \Typo3RectorPrefix20210422\Symplify\EasyCodingStandard\ValueObject\Set\SetList::COMMON, \Typo3RectorPrefix20210422\Symplify\EasyCodingStandard\ValueObject\Set\SetList::CLEAN_CODE]);
};
