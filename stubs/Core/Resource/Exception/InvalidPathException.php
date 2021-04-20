<?php

declare (strict_types=1);


use Exception;
if (\class_exists(\TYPO3\CMS\Core\Resource\Exception\InvalidPathException::class)) {
    return;
}
final class InvalidPathException extends \Exception
{
}
