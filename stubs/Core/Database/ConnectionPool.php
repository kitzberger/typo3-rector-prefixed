<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Database;

if (\class_exists(\TYPO3\CMS\Core\Database\ConnectionPool::class)) {
    return;
}
final class ConnectionPool
{
    public function getConnectionForTable(string $table) : \TYPO3\CMS\Core\Database\Connection
    {
        return new \TYPO3\CMS\Core\Database\Connection();
    }
    public function getQueryBuilderForTable($table) : void
    {
    }
}
