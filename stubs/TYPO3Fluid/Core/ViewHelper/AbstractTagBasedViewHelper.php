<?php

declare (strict_types=1);


if (\class_exists(\TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper::class)) {
    return;
}
abstract class AbstractTagBasedViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
{
}
