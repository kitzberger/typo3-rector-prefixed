<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Resource;

if (\class_exists(\TYPO3\CMS\Core\Resource\ResourceFactory::class)) {
    return;
}
class ResourceFactory
{
    public static function getInstance() : self
    {
        return new self();
    }
}
