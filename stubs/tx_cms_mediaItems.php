<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_cms_mediaItems::class)) {
    return;
}
class tx_cms_mediaItems
{
}
\class_alias('tx_cms_mediaItems', 'tx_cms_mediaItems', \false);
