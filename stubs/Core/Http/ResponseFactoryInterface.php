<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Http;

use Psr\Http\Message\ResponseInterface;
if (\class_exists(\TYPO3\CMS\Core\Http\ResponseFactoryInterface::class)) {
    return;
}
interface ResponseFactoryInterface
{
    public function createHtmlResponse(string $html) : \Psr\Http\Message\ResponseInterface;
    public function createJsonResponse(string $json) : \Psr\Http\Message\ResponseInterface;
}
