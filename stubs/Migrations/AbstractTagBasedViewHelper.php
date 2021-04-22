<?php

declare (strict_types=1);
namespace TYPO3\CMS\Fluid\Core\ViewHelper;

if (\class_exists(\TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper::class)) {
    return;
}
final class AbstractTagBasedViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{
}
