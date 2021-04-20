<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Backend\Routing\UriBuilder::class)) {
    return;
}
final class UriBuilder
{
    private const ABSOLUTE_PATH = 'bar';
    public function buildUriFromRoute($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH) : string
    {
        return 'foo';
    }
}
