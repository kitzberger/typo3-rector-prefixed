<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\SC_mod_web_perm_ajax::class)) {
    return;
}
class SC_mod_web_perm_ajax
{
}
\class_alias('SC_mod_web_perm_ajax', 'SC_mod_web_perm_ajax', \false);
