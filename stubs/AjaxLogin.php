<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\AjaxLogin::class)) {
    return;
}
class AjaxLogin
{
}
\class_alias('AjaxLogin', 'AjaxLogin', \false);
