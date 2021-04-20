<?php

declare (strict_types=1);


use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
if (\class_exists(\TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper::class)) {
    return;
}
class AbstractViewHelper
{
    /**
     * @var RenderingContextInterface
     */
    protected $renderingContext;
    public function initializeArguments() : void
    {
    }
}
