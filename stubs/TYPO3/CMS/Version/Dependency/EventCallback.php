<?php

declare (strict_types=1);
namespace TYPO3\CMS\Version\Dependency;

if (\class_exists(\TYPO3\CMS\Version\Dependency\EventCallback::class)) {
    return;
}
class EventCallback
{
}
