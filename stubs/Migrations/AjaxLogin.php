<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\AjaxLogin::class)) {
    return;
}
final class AjaxLogin
{
}
\class_alias('AjaxLogin', 'AjaxLogin', \false);
