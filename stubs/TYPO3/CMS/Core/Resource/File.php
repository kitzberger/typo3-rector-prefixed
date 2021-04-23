<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Resource;

if (\class_exists(\TYPO3\CMS\Core\Resource\File::class)) {
    return;
}
class File
{
    public function _getMetaData() : string
    {
        return 'foo';
    }
    public function getMetaData() : \TYPO3\CMS\Core\Resource\MetaDataAspect
    {
        return new \TYPO3\CMS\Core\Resource\MetaDataAspect();
    }
}
