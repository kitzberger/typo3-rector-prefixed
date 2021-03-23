<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210323;

use Rector\Core\Stubs\StubLoader;
use Typo3RectorPrefix20210323\Tracy\Debugger;
require_once __DIR__ . '/../vendor/autoload.php';
// @see https://github.com/phpstan/phpstan/issues/4541#issuecomment-779434916
require_once 'phar://vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionUnionType.php';
require_once 'phar://vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/Attribute.php';
// silent deprecations, since we test them
\error_reporting(\E_ALL ^ \E_DEPRECATED);
// performance boost
\gc_disable();
// load stubs
$stubLoader = new \Rector\Core\Stubs\StubLoader();
$stubLoader->loadStubs();
// make dump() useful and not nest infinity spam
\Typo3RectorPrefix20210323\Tracy\Debugger::$maxDepth = 2;
