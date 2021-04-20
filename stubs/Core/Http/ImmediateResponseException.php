<?php

declare (strict_types=1);


use Exception;
if (\class_exists(\TYPO3\CMS\Core\Http\ImmediateResponseException::class)) {
    return;
}
final class ImmediateResponseException extends \Exception
{
}
