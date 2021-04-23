<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_cms_layout_tt_content_drawItemHook::class)) {
    return;
}
class tx_cms_layout_tt_content_drawItemHook
{
}
\class_alias('tx_cms_layout_tt_content_drawItemHook', 'tx_cms_layout_tt_content_drawItemHook', \false);
