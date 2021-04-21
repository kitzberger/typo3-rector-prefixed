<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */
declare (strict_types=1);
namespace Typo3RectorPrefix20210421\Nette\Bridges\CacheDI;

use Typo3RectorPrefix20210421\Nette;
/**
 * Cache extension for Nette DI.
 */
final class CacheExtension extends \Typo3RectorPrefix20210421\Nette\DI\CompilerExtension
{
    /** @var string */
    private $tempDir;
    public function __construct(string $tempDir)
    {
        $this->tempDir = $tempDir;
    }
    public function loadConfiguration()
    {
        $dir = $this->tempDir . '/cache';
        \Typo3RectorPrefix20210421\Nette\Utils\FileSystem::createDir($dir);
        if (!\is_writable($dir)) {
            throw new \Typo3RectorPrefix20210421\Nette\InvalidStateException("Make directory '{$dir}' writable.");
        }
        $builder = $this->getContainerBuilder();
        if (\extension_loaded('pdo_sqlite')) {
            $builder->addDefinition($this->prefix('journal'))->setType(\Typo3RectorPrefix20210421\Nette\Caching\Storages\Journal::class)->setFactory(\Typo3RectorPrefix20210421\Nette\Caching\Storages\SQLiteJournal::class, [$dir . '/journal.s3db']);
        }
        $builder->addDefinition($this->prefix('storage'))->setType(\Typo3RectorPrefix20210421\Nette\Caching\Storage::class)->setFactory(\Typo3RectorPrefix20210421\Nette\Caching\Storages\FileStorage::class, [$dir]);
        if ($this->name === 'cache') {
            if (\extension_loaded('pdo_sqlite')) {
                $builder->addAlias('nette.cacheJournal', $this->prefix('journal'));
            }
            $builder->addAlias('cacheStorage', $this->prefix('storage'));
        }
    }
}
