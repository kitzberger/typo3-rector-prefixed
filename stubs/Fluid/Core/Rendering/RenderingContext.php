<?php

declare (strict_types=1);
namespace TYPO3\CMS\Fluid\Core\Rendering;

if (\class_exists(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContext::class)) {
    return;
}
class RenderingContext extends \TYPO3Fluid\Fluid\Core\Rendering\RenderingContext
{
}
