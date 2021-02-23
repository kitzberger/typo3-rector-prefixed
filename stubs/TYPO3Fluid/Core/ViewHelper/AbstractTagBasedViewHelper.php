<?php

declare (strict_types=1);
namespace TYPO3Fluid\Fluid\Core\ViewHelper;

if (\class_exists(\TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper::class)) {
    return;
}
abstract class AbstractTagBasedViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
{
}
