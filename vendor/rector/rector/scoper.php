<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210315;

use Typo3RectorPrefix20210315\Nette\Utils\DateTime;
use Typo3RectorPrefix20210315\Nette\Utils\Strings;
use Rector\Compiler\PhpScoper\StaticEasyPrefixer;
use Rector\Compiler\Unprefixer;
use Rector\Compiler\ValueObject\ScoperOption;
require_once __DIR__ . '/vendor/autoload.php';
// [BEWARE] this path is relative to the root and location of this file
$filePathsToSkip = [
    // @see https://github.com/rectorphp/rector/issues/2852#issuecomment-586315588
    'vendor/symfony/deprecation-contracts/function.php',
];
// remove phpstan, because it is already prefixed in its own scope
$dateTime = \Typo3RectorPrefix20210315\Nette\Utils\DateTime::from('now');
$timestamp = $dateTime->format('Ymd');
// see https://github.com/humbug/php-scoper
return [\Rector\Compiler\ValueObject\ScoperOption::PREFIX => 'RectorPrefix' . $timestamp, \Rector\Compiler\ValueObject\ScoperOption::FILES_WHITELIST => $filePathsToSkip, \Rector\Compiler\ValueObject\ScoperOption::WHITELIST => \Rector\Compiler\PhpScoper\StaticEasyPrefixer::getExcludedNamespacesAndClasses(), \Rector\Compiler\ValueObject\ScoperOption::PATCHERS => [
    // [BEWARE] $filePath is absolute!
    // unprefix string classes, as they're string on purpose - they have to be checked in original form, not prefixed
    function (string $filePath, string $prefix, string $content) : string {
        // skip vendor
        if (\Typo3RectorPrefix20210315\Nette\Utils\Strings::contains($filePath, 'vendor/')) {
            return $content;
        }
        // skip bin/rector.php for composer autoload class
        if (\Typo3RectorPrefix20210315\Nette\Utils\Strings::endsWith($filePath, 'bin/rector.php')) {
            return $content;
        }
        // skip scoper-autoload
        if (\Typo3RectorPrefix20210315\Nette\Utils\Strings::endsWith($filePath, 'vendor/scoper-autoload.php')) {
            return $content;
        }
        return \Rector\Compiler\Unprefixer::unprefixQuoted($content, $prefix);
    },
    // scoper missed PSR-4 autodiscovery in Symfony
    function (string $filePath, string $prefix, string $content) : string {
        // scoper missed PSR-4 autodiscovery in Symfony
        if (!\Typo3RectorPrefix20210315\Nette\Utils\Strings::endsWith($filePath, 'config.php') && !\Typo3RectorPrefix20210315\Nette\Utils\Strings::endsWith($filePath, 'services.php')) {
            return $content;
        }
        // skip "Rector\\" namespace
        if (\Typo3RectorPrefix20210315\Nette\Utils\Strings::contains($content, '$services->load(\'Rector')) {
            return $content;
        }
        return \Typo3RectorPrefix20210315\Nette\Utils\Strings::replace($content, '#services\\->load\\(\'#', 'services->load(\'' . $prefix . '\\');
    },
]];
