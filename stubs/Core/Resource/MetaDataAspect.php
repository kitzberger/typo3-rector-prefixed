<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Resource;

if (\class_exists(\TYPO3\CMS\Core\Resource\MetaDataAspect::class)) {
    return;
}
final class MetaDataAspect
{
    public function get() : string
    {
        return 'foo';
    }
}
