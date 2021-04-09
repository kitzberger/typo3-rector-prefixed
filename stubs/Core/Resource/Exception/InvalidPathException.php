<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Resource\Exception;

use Exception;
if (\class_exists(\TYPO3\CMS\Core\Resource\Exception\InvalidPathException::class)) {
    return;
}
final class InvalidPathException extends \Exception
{
}