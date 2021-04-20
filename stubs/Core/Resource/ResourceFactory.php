<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Core\Resource\ResourceFactory::class)) {
    return;
}
final class ResourceFactory
{
    public static function getInstance() : self
    {
        return new self();
    }
}
