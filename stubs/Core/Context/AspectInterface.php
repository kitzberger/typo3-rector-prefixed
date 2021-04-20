<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Core\Context\AspectInterface::class)) {
    return;
}
interface AspectInterface
{
    public function get(string $name);
}
