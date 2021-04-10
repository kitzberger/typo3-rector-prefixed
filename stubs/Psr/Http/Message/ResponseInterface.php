<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210410\Psr\Http\Message;

if (\interface_exists(\Typo3RectorPrefix20210410\Psr\Http\Message\ResponseInterface::class)) {
    return;
}
interface ResponseInterface
{
    public function withStatus(string $code, string $reasonPhrase = '') : \Typo3RectorPrefix20210410\Psr\Http\Message\ResponseInterface;
}
