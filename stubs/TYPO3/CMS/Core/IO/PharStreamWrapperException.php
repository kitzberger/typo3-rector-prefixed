<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\IO;

if (\class_exists(\TYPO3\CMS\Core\IO\PharStreamWrapperException::class)) {
    return;
}
class PharStreamWrapperException
{
}
