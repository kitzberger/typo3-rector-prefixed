<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210414;

use Rector\Core\Configuration\Option;
use Rector\Core\Stubs\PHPStanStubLoader;
use Rector\Set\ValueObject\DowngradeSetList;
use Typo3RectorPrefix20210414\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
$phpStanStubLoader = new \Rector\Core\Stubs\PHPStanStubLoader();
$phpStanStubLoader->loadStubs();
return static function (\Typo3RectorPrefix20210414\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::SKIP, \Typo3RectorPrefix20210414\DowngradeRectorConfig::DEPENDENCY_EXCLUDE_PATHS);
    $parameters->set(\Rector\Core\Configuration\Option::PHPSTAN_FOR_RECTOR_PATH, __DIR__ . '/phpstan-for-downgrade.neon');
    $parameters->set(\Rector\Core\Configuration\Option::SETS, [\Rector\Set\ValueObject\DowngradeSetList::PHP_80, \Rector\Set\ValueObject\DowngradeSetList::PHP_74, \Rector\Set\ValueObject\DowngradeSetList::PHP_73, \Rector\Set\ValueObject\DowngradeSetList::PHP_72]);
};
/**
 * Configuration consts for the different rector.php config files
 */
final class DowngradeRectorConfig
{
    /**
     * Exclude paths when downgrading a dependency
     */
    public const DEPENDENCY_EXCLUDE_PATHS = [
        '*/tests/*',
        // symfony test are parts of package
        '*/Test/*',
        // missing phpunit test case
        'packages/Testing/PHPUnit/AbstractRectorTestCase.php',
        'packages/Testing/PHPUnit/AbstractComposerRectorTestCase.php',
        // only for dev
        'packages/Testing/PhpConfigPrinter/*',
        // Individual classes that can be excluded because
        // they are not used by Rector, and they use classes
        // loaded with "require-dev" so it'd throw an error
        // use relative paths, so files are excluded on nested directory too
        'vendor/symfony/http-kernel/HttpKernelBrowser.php',
        'vendor/symfony/http-foundation/Session/*',
        'vendor/symfony/string/Slugger/AsciiSlugger.php',
        'vendor/symfony/cache/*',
        'nette/caching/src/Bridges/*',
        // always excluded
        '*vendor/symfony/polyfill*/bootstrap80.php',
        // This class has an issue for PHP 7.1:
        // https://github.com/rectorphp/rector/issues/4816#issuecomment-743209526
        // It doesn't happen often, and Rector doesn't use it, so then
        // we simply skip downgrading this class
        'vendor/symfony/dependency-injection/ExpressionLanguage.php',
        'vendor/symfony/dependency-injection/ExpressionLanguageProvider.php',
        'vendor/symfony/var-dumper/Caster/*',
        'vendor/symplify/package-builder/src/Testing/AbstractKernelTestCase.php',
    ];
}
/**
 * Configuration consts for the different rector.php config files
 */
\class_alias('Typo3RectorPrefix20210414\\DowngradeRectorConfig', 'DowngradeRectorConfig', \false);
