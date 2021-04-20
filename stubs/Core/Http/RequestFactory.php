<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Core\Http\RequestFactory::class)) {
    return;
}
final class RequestFactory
{
    public function request(string $uri, string $method = 'GET', array $options = []) : void
    {
    }
}
