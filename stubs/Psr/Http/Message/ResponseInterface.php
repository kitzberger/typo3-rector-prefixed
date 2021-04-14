<?php

declare (strict_types=1);
namespace Psr\Http\Message;

if (\interface_exists(\Psr\Http\Message\ResponseInterface::class)) {
    return;
}
interface ResponseInterface
{
    public function withStatus(string $code, string $reasonPhrase = '') : \Psr\Http\Message\ResponseInterface;
}
