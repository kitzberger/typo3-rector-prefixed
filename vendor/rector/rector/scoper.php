<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420;

use Typo3RectorPrefix20210420\Nette\Utils\DateTime;
use Typo3RectorPrefix20210420\Nette\Utils\Strings;
use Rector\Compiler\PhpScoper\StaticEasyPrefixer;
use Rector\Compiler\Unprefixer;
use Rector\Compiler\ValueObject\ScoperOption;
require_once __DIR__ . '/vendor/autoload.php';
// [BEWARE] this path is relative to the root and location of this file
$filePathsToRemoveNamespace = [
    // @see https://github.com/rectorphp/rector/issues/2852#issuecomment-586315588
    'vendor/symfony/deprecation-contracts/function.php',
    // it would make polyfill function work only with namespace = brokes
    'vendor/symfony/polyfill-ctype/bootstrap.php',
    'vendor/symfony/polyfill-intl-normalizer/bootstrap.php',
    'vendor/symfony/polyfill-intl-grapheme/bootstrap.php',
    'vendor/symfony/polyfill-mbstring/bootstrap.php',
    'vendor/symfony/polyfill-php80/bootstrap.php',
    'vendor/symfony/polyfill-php74/bootstrap.php',
    'vendor/symfony/polyfill-php73/bootstrap.php',
    'vendor/symfony/polyfill-php72/bootstrap.php',
    'vendor/symfony/polyfill-uuid/bootstrap.php',
];
// remove phpstan, because it is already prefixed in its own scope
$dateTime = \Typo3RectorPrefix20210420\Nette\Utils\DateTime::from('now');
$timestamp = $dateTime->format('Ymd');
// see https://github.com/humbug/php-scoper
return [\Rector\Compiler\ValueObject\ScoperOption::PREFIX => 'RectorPrefix' . $timestamp, \Rector\Compiler\ValueObject\ScoperOption::WHITELIST => \Rector\Compiler\PhpScoper\StaticEasyPrefixer::getExcludedNamespacesAndClasses(), \Rector\Compiler\ValueObject\ScoperOption::PATCHERS => [
    // [BEWARE] $filePath is absolute!
    // fixes https://github.com/rectorphp/rector-prefixed/runs/2143717534
    function (string $filePath, string $prefix, string $content) use($filePathsToRemoveNamespace) : string {
        // @see https://regex101.com/r/0jaVB1/1
        $prefixedNamespacePattern = '#^namespace (.*?);$#m';
        foreach ($filePathsToRemoveNamespace as $filePathToRemoveNamespace) {
            if (\Typo3RectorPrefix20210420\Nette\Utils\Strings::endsWith($filePath, $filePathToRemoveNamespace)) {
                return \Typo3RectorPrefix20210420\Nette\Utils\Strings::replace($content, $prefixedNamespacePattern, '');
            }
        }
        return $content;
    },
    // fixes https://github.com/rectorphp/rector-prefixed/runs/2103759172
    // and https://github.com/rectorphp/rector-prefixed/blob/0cc433e746b645df5f905fa038573c3a1a9634f0/vendor/jean85/pretty-package-versions/src/PrettyVersions.php#L6
    function (string $filePath, string $prefix, string $content) : string {
        if (!\Typo3RectorPrefix20210420\Nette\Utils\Strings::endsWith($filePath, 'vendor/jean85/pretty-package-versions/src/PrettyVersions.php')) {
            return $content;
        }
        // see https://regex101.com/r/v8zRMm/1
        return \Typo3RectorPrefix20210420\Nette\Utils\Strings::replace($content, '#' . $prefix . '\\\\Composer\\\\InstalledVersions#', 'Typo3RectorPrefix20210420\\Composer\\InstalledVersions');
    },
    // fixes https://github.com/rectorphp/rector/issues/6007
    function (string $filePath, string $prefix, string $content) : string {
        if (!\Typo3RectorPrefix20210420\Nette\Utils\Strings::contains($filePath, 'vendor/')) {
            return $content;
        }
        // @see https://regex101.com/r/lBV8IO/2
        $fqcnReservedPattern = \sprintf('#(\\\\)?%s\\\\(parent|self|static)#m', $prefix);
        $matches = \Typo3RectorPrefix20210420\Nette\Utils\Strings::matchAll($content, $fqcnReservedPattern);
        if (!$matches) {
            return $content;
        }
        foreach ($matches as $match) {
            $content = \str_replace($match[0], $match[2], $content);
        }
        return $content;
    },
    // fixes https://github.com/rectorphp/rector/issues/6010
    function (string $filePath, string $prefix, string $content) : string {
        // @see https://regex101.com/r/bA1nQa/1
        if (!\Typo3RectorPrefix20210420\Nette\Utils\Strings::match($filePath, '#vendor/symfony/polyfill-php\\d{2}/Resources/stubs#')) {
            return $content;
        }
        // @see https://regex101.com/r/x5Ukrx/1
        $namespace = \sprintf('#namespace %s;#m', $prefix);
        return \Typo3RectorPrefix20210420\Nette\Utils\Strings::replace($content, $namespace);
    },
    // unprefix string classes, as they're string on purpose - they have to be checked in original form, not prefixed
    function (string $filePath, string $prefix, string $content) : string {
        // skip vendor, expect rector packages
        if (\Typo3RectorPrefix20210420\Nette\Utils\Strings::contains($filePath, 'vendor/') && !\Typo3RectorPrefix20210420\Nette\Utils\Strings::contains($filePath, 'vendor/rector')) {
            return $content;
        }
        // skip bin/rector.php for composer autoload class
        if (\Typo3RectorPrefix20210420\Nette\Utils\Strings::endsWith($filePath, 'bin/rector.php')) {
            return $content;
        }
        // skip scoper-autoload
        if (\Typo3RectorPrefix20210420\Nette\Utils\Strings::endsWith($filePath, 'vendor/scoper-autoload.php')) {
            return $content;
        }
        return \Rector\Compiler\Unprefixer::unprefixQuoted($content, $prefix);
    },
    // scoper missed PSR-4 autodiscovery in Symfony
    function (string $filePath, string $prefix, string $content) : string {
        // scoper missed PSR-4 autodiscovery in Symfony
        if (!\Typo3RectorPrefix20210420\Nette\Utils\Strings::endsWith($filePath, 'config.php') && !\Typo3RectorPrefix20210420\Nette\Utils\Strings::endsWith($filePath, 'services.php')) {
            return $content;
        }
        // skip "Rector\\" namespace
        if (\Typo3RectorPrefix20210420\Nette\Utils\Strings::contains($content, '$services->load(\'Rector')) {
            return $content;
        }
        return \Typo3RectorPrefix20210420\Nette\Utils\Strings::replace($content, '#services\\->load\\(\'#', 'services->load(\'' . $prefix . '\\');
    },
]];
