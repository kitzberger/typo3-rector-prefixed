<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210418\GuzzleHttp\Message;

if (\interface_exists('Typo3RectorPrefix20210418\\GuzzleHttp\\Message\\MessageInterface')) {
    return;
}
interface MessageInterface
{
    public function getMessage();
}
