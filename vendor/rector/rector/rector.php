<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210409;

use Typo3RectorPrefix20210409\PHPUnit\Framework\TestCase;
use Rector\CodingStyle\Rector\MethodCall\PreferThisOrSelfMethodCallRector;
use Rector\CodingStyle\Rector\String_\SplitStringClassConstantToClassConstFetchRector;
use Rector\CodingStyle\ValueObject\PreferenceSelfThis;
use Rector\Core\Configuration\Option;
use Rector\Core\Rector\AbstractRector;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Php55\Rector\String_\StringClassNameToClassConstantRector;
use Rector\PHPUnit\Rector\Class_\AddSeeTestAnnotationRector;
use Rector\Privatization\Rector\Property\PrivatizeLocalPropertyToPrivatePropertyRector;
use Rector\Restoration\Rector\ClassMethod\InferParamFromClassMethodReturnRector;
use Rector\Restoration\ValueObject\InferParamFromClassMethodReturn;
use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\FunctionLike\ReturnTypeDeclarationRector;
use Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $configuration = \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Restoration\ValueObject\InferParamFromClassMethodReturn(\Rector\Core\Rector\AbstractRector::class, 'refactor', 'getNodeTypes')]);
    $services->set(\Rector\Restoration\Rector\ClassMethod\InferParamFromClassMethodReturnRector::class)->call('configure', [[\Rector\Restoration\Rector\ClassMethod\InferParamFromClassMethodReturnRector::INFER_PARAMS_FROM_CLASS_METHOD_RETURNS => $configuration]]);
    $services->set(\Rector\CodingStyle\Rector\MethodCall\PreferThisOrSelfMethodCallRector::class)->call('configure', [[\Rector\CodingStyle\Rector\MethodCall\PreferThisOrSelfMethodCallRector::TYPE_TO_PREFERENCE => [\Typo3RectorPrefix20210409\PHPUnit\Framework\TestCase::class => \Rector\CodingStyle\ValueObject\PreferenceSelfThis::PREFER_THIS]]]);
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::SETS, [\Rector\Set\ValueObject\SetList::CODING_STYLE, \Rector\Set\ValueObject\SetList::CODE_QUALITY, \Rector\Set\ValueObject\SetList::CODE_QUALITY_STRICT, \Rector\Set\ValueObject\SetList::DEAD_CODE, \Rector\Set\ValueObject\SetList::NETTE_UTILS_CODE_QUALITY, \Rector\Set\ValueObject\SetList::PRIVATIZATION, \Rector\Set\ValueObject\SetList::NAMING, \Rector\Set\ValueObject\SetList::TYPE_DECLARATION, \Rector\Set\ValueObject\SetList::PHPUNIT_CODE_QUALITY, \Rector\Set\ValueObject\SetList::PHP_71, \Rector\Set\ValueObject\SetList::PHP_72, \Rector\Set\ValueObject\SetList::PHP_73, \Rector\Set\ValueObject\SetList::EARLY_RETURN, \Rector\Set\ValueObject\SetList::TYPE_DECLARATION_STRICT]);
    $parameters->set(\Rector\Core\Configuration\Option::PATHS, [__DIR__ . '/src', __DIR__ . '/rules', __DIR__ . '/rules-tests', __DIR__ . '/packages', __DIR__ . '/packages-tests', __DIR__ . '/tests', __DIR__ . '/utils', __DIR__ . '/config/set']);
    $parameters->set(\Rector\Core\Configuration\Option::AUTO_IMPORT_NAMES, \true);
    $parameters->set(\Rector\Core\Configuration\Option::SKIP, [
        // buggy in refactoring
        \Rector\PHPUnit\Rector\Class_\AddSeeTestAnnotationRector::class,
        \Rector\Php55\Rector\String_\StringClassNameToClassConstantRector::class,
        // some classes in config might not exist without dev dependencies
        \Rector\CodingStyle\Rector\String_\SplitStringClassConstantToClassConstFetchRector::class,
        \Rector\Privatization\Rector\Property\PrivatizeLocalPropertyToPrivatePropertyRector::class => [__DIR__ . '/src/Rector/AbstractRector.php'],
        \Rector\TypeDeclaration\Rector\FunctionLike\ReturnTypeDeclarationRector::class => [__DIR__ . '/packages/PHPStanStaticTypeMapper/TypeMapper/ArrayTypeMapper.php', __DIR__ . '/packages/PHPStanStaticTypeMapper/TypeMapper/ObjectTypeMapper.php'],
        // test paths
        '*/Fixture/*',
        '*/Fixture/*',
        '*/Source/*',
        '*/Source*/*',
        '*/Expected/*',
        '*/Expected*/*',
    ]);
    $parameters->set(\Rector\Core\Configuration\Option::PHP_VERSION_FEATURES, \Rector\Core\ValueObject\PhpVersion::PHP_73);
    $parameters->set(\Rector\Core\Configuration\Option::ENABLE_CACHE, \true);
};
