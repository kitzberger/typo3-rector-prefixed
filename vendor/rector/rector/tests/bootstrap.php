<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210410;

use Rector\Core\Stubs\PHPStanStubLoader;
use Typo3RectorPrefix20210410\Tracy\Debugger;
require_once __DIR__ . '/../vendor/autoload.php';
// silent deprecations, since we test them
\error_reporting(\E_ALL ^ \E_DEPRECATED);
// performance boost
\gc_disable();
$phpStanStubLoader = new \Rector\Core\Stubs\PHPStanStubLoader();
$phpStanStubLoader->loadStubs();
// make dump() useful and not nest infinity spam
\Typo3RectorPrefix20210410\Tracy\Debugger::$maxDepth = 2;
