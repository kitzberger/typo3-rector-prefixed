<?php

declare (strict_types=1);
namespace TYPO3\CMS\Frontend\Resource;

use TYPO3\CMS\Core\Resource\Exception\FileDoesNotExistException;
use TYPO3\CMS\Core\Resource\Exception\InvalidFileException;
use TYPO3\CMS\Core\Resource\Exception\InvalidFileNameException;
use TYPO3\CMS\Core\Resource\Exception\InvalidPathException;
if (\class_exists(\TYPO3\CMS\Frontend\Resource\FilePathSanitizer::class)) {
    return;
}
final class FilePathSanitizer
{
    public function sanitize(string $originalFileName) : string
    {
        if ($originalFileName === 'foo') {
            throw new \TYPO3\CMS\Core\Resource\Exception\InvalidFileNameException($originalFileName);
        }
        if ($originalFileName === 'bar') {
            throw new \TYPO3\CMS\Core\Resource\Exception\InvalidPathException($originalFileName);
        }
        if ($originalFileName === 'baz') {
            throw new \TYPO3\CMS\Core\Resource\Exception\FileDoesNotExistException($originalFileName);
        }
        if ($originalFileName === 'bazbar') {
            throw new \TYPO3\CMS\Core\Resource\Exception\InvalidFileException($originalFileName);
        }
        return 'foo';
    }
}
