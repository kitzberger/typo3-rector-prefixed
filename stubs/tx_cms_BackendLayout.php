<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_cms_BackendLayout::class)) {
    return;
}
class tx_cms_BackendLayout
{
}
\class_alias('tx_cms_BackendLayout', 'tx_cms_BackendLayout', \false);
