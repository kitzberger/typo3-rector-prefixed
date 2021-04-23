<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_cms_webinfo_page::class)) {
    return;
}
class tx_cms_webinfo_page
{
}
\class_alias('tx_cms_webinfo_page', 'tx_cms_webinfo_page', \false);
