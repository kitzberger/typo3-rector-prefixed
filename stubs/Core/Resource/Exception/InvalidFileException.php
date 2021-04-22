<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Resource\Exception;

use Exception;
if (\class_exists(\TYPO3\CMS\Core\Resource\Exception\InvalidFileException::class)) {
    return;
}
final class InvalidFileException extends \Exception
{
}
