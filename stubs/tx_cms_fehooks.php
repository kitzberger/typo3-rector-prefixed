<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_cms_fehooks::class)) {
    return;
}
class tx_cms_fehooks
{
}
\class_alias('tx_cms_fehooks', 'tx_cms_fehooks', \false);
