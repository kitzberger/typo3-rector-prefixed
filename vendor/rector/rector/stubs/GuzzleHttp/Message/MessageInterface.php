<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420\GuzzleHttp\Message;

if (\interface_exists('GuzzleHttp\\Message\\MessageInterface')) {
    return;
}
interface MessageInterface
{
    public function getMessage();
}
