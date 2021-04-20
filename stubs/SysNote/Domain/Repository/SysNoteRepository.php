<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\SysNote\Domain\Repository\SysNoteRepository::class)) {
    return;
}
final class SysNoteRepository
{
    public function findByPidsAndAuthorId($pids, int $author, int $position = null) : array
    {
        return [];
    }
}
