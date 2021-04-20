<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject::class)) {
    return;
}
class AbstractDomainObject
{
    public function __wakeup()
    {
    }
}
