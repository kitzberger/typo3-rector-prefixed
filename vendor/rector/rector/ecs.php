<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210409;

use Typo3RectorPrefix20210409\PhpCsFixer\Fixer\Operator\UnaryOperatorSpacesFixer;
use Typo3RectorPrefix20210409\PhpCsFixer\Fixer\Phpdoc\GeneralPhpdocAnnotationRemoveFixer;
use Typo3RectorPrefix20210409\PhpCsFixer\Fixer\Phpdoc\NoSuperfluousPhpdocTagsFixer;
use Typo3RectorPrefix20210409\PhpCsFixer\Fixer\Phpdoc\PhpdocTypesFixer;
use Typo3RectorPrefix20210409\PhpCsFixer\Fixer\PhpTag\BlankLineAfterOpeningTagFixer;
use Typo3RectorPrefix20210409\PhpCsFixer\Fixer\PhpUnit\PhpUnitStrictFixer;
use Typo3RectorPrefix20210409\PhpCsFixer\Fixer\ReturnNotation\ReturnAssignmentFixer;
use Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Typo3RectorPrefix20210409\Symplify\CodingStandard\Fixer\ArrayNotation\ArrayListItemNewlineFixer;
use Typo3RectorPrefix20210409\Symplify\CodingStandard\Fixer\Commenting\RemoveCommentedCodeFixer;
use Typo3RectorPrefix20210409\Symplify\CodingStandard\Fixer\LineLength\DocBlockLineLengthFixer;
use Typo3RectorPrefix20210409\Symplify\EasyCodingStandard\ValueObject\Option;
use Typo3RectorPrefix20210409\Symplify\EasyCodingStandard\ValueObject\Set\SetList;
return static function (\Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Typo3RectorPrefix20210409\PhpCsFixer\Fixer\Phpdoc\GeneralPhpdocAnnotationRemoveFixer::class)->call('configure', [['annotations' => ['throws', 'author', 'package', 'group', 'required']]]);
    $services->set(\Typo3RectorPrefix20210409\PhpCsFixer\Fixer\Phpdoc\NoSuperfluousPhpdocTagsFixer::class)->call('configure', [['allow_mixed' => \true]]);
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Typo3RectorPrefix20210409\Symplify\EasyCodingStandard\ValueObject\Option::PATHS, [__DIR__ . '/bin', __DIR__ . '/src', __DIR__ . '/packages', __DIR__ . '/packages-tests', __DIR__ . '/rules', __DIR__ . '/rules-tests', __DIR__ . '/tests', __DIR__ . '/utils', __DIR__ . '/config', __DIR__ . '/ecs.php', __DIR__ . '/rector.php', __DIR__ . '/config/set']);
    $parameters->set(\Typo3RectorPrefix20210409\Symplify\EasyCodingStandard\ValueObject\Option::SETS, [\Typo3RectorPrefix20210409\Symplify\EasyCodingStandard\ValueObject\Set\SetList::PSR_12, \Typo3RectorPrefix20210409\Symplify\EasyCodingStandard\ValueObject\Set\SetList::SYMPLIFY, \Typo3RectorPrefix20210409\Symplify\EasyCodingStandard\ValueObject\Set\SetList::COMMON, \Typo3RectorPrefix20210409\Symplify\EasyCodingStandard\ValueObject\Set\SetList::CLEAN_CODE]);
    $parameters->set(\Typo3RectorPrefix20210409\Symplify\EasyCodingStandard\ValueObject\Option::SKIP, [
        '*/Source/*',
        '*/Fixture/*',
        '*/Expected/*',
        \Typo3RectorPrefix20210409\PhpCsFixer\Fixer\Phpdoc\GeneralPhpdocAnnotationRemoveFixer::class => [
            __DIR__ . '/src/Rector/AbstractRector.php',
            '*TypeInferer*',
            '*TypeResolver*',
            '*NameResolver*',
            '*Mapper*',
            // allowed @required
            __DIR__ . '/packages/StaticTypeMapper/Naming/NameScopeFactory.php',
            __DIR__ . '/packages/NodeTypeResolver/NodeTypeResolver.php',
            __DIR__ . '/packages/BetterPhpDocParser/PhpDocNodeFactory/AbstractPhpDocNodeFactory.php',
            __DIR__ . '/packages/BetterPhpDocParser/PhpDocParser/StaticDoctrineAnnotationParser/PlainValueParser.php',
        ],
        \Typo3RectorPrefix20210409\PhpCsFixer\Fixer\Operator\UnaryOperatorSpacesFixer::class,
        // buggy with specific markdown snippet file in docs/rules_overview.md
        \Typo3RectorPrefix20210409\Symplify\CodingStandard\Fixer\ArrayNotation\ArrayListItemNewlineFixer::class,
        \Typo3RectorPrefix20210409\PhpCsFixer\Fixer\PhpTag\BlankLineAfterOpeningTagFixer::class,
        // buggy - @todo fix on Symplify master
        \Typo3RectorPrefix20210409\Symplify\CodingStandard\Fixer\Commenting\RemoveCommentedCodeFixer::class,
        \Typo3RectorPrefix20210409\Symplify\CodingStandard\Fixer\LineLength\DocBlockLineLengthFixer::class,
        // breaks on-purpose annotated variables
        \Typo3RectorPrefix20210409\PhpCsFixer\Fixer\ReturnNotation\ReturnAssignmentFixer::class,
        \Typo3RectorPrefix20210409\PhpCsFixer\Fixer\Phpdoc\PhpdocTypesFixer::class => [__DIR__ . '/rules/Php74/Rector/Double/RealToFloatTypeCastRector.php'],
        // buggy on "Float" class
        \Typo3RectorPrefix20210409\PhpCsFixer\Fixer\PhpUnit\PhpUnitStrictFixer::class => [__DIR__ . '/packages-tests/BetterPhpDocParser/PhpDocInfo/PhpDocInfo/PhpDocInfoTest.php', __DIR__ . '/tests/PhpParser/Node/NodeFactoryTest.php', __DIR__ . '/packages-tests/BetterPhpDocParser/PhpDocParser/StaticDoctrineAnnotationParser/StaticDoctrineAnnotationParserTest.php', '*TypeResolverTest.php'],
    ]);
    $parameters->set(\Typo3RectorPrefix20210409\Symplify\EasyCodingStandard\ValueObject\Option::LINE_ENDING, "\n");
};
