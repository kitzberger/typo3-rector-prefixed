<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Http;

if (\class_exists(\TYPO3\CMS\Core\Http\RequestFactory::class)) {
    return;
}
final class RequestFactory
{
    public function request(string $uri, string $method = 'GET', array $options = []) : void
    {
    }
}
