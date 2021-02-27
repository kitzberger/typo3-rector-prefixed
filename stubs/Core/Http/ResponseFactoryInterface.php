<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Http;

use Typo3RectorPrefix20210227\Psr\Http\Message\ResponseInterface;
if (\class_exists(\TYPO3\CMS\Core\Http\ResponseFactoryInterface::class)) {
    return;
}
interface ResponseFactoryInterface
{
    public function createHtmlResponse(string $html) : \Typo3RectorPrefix20210227\Psr\Http\Message\ResponseInterface;
    public function createJsonResponse(string $json) : \Typo3RectorPrefix20210227\Psr\Http\Message\ResponseInterface;
}
