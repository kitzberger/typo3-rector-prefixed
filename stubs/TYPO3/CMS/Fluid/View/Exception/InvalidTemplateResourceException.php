<?php

declare (strict_types=1);
namespace TYPO3\CMS\Fluid\View\Exception;

if (\class_exists(\TYPO3\CMS\Fluid\View\Exception\InvalidTemplateResourceException::class)) {
    return;
}
class InvalidTemplateResourceException
{
}
