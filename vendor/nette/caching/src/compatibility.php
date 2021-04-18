<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */
declare (strict_types=1);
namespace Typo3RectorPrefix20210418\Nette\Caching;

if (\false) {
    /** @deprecated use Nette\Caching\BulkReader */
    interface IBulkReader extends \Typo3RectorPrefix20210418\Nette\Caching\BulkReader
    {
    }
} elseif (!\interface_exists(\Typo3RectorPrefix20210418\Nette\Caching\IBulkReader::class)) {
    \class_alias(\Typo3RectorPrefix20210418\Nette\Caching\BulkReader::class, \Typo3RectorPrefix20210418\Nette\Caching\IBulkReader::class);
}
if (\false) {
    /** @deprecated use Nette\Caching\Storage */
    interface IStorage extends \Typo3RectorPrefix20210418\Nette\Caching\Storage
    {
    }
} elseif (!\interface_exists(\Typo3RectorPrefix20210418\Nette\Caching\IStorage::class)) {
    \class_alias(\Typo3RectorPrefix20210418\Nette\Caching\Storage::class, \Typo3RectorPrefix20210418\Nette\Caching\IStorage::class);
}
namespace Typo3RectorPrefix20210418\Nette\Caching\Storages;

if (\false) {
    /** @deprecated use Nette\Caching\Storages\Journal */
    interface IJournal extends \Typo3RectorPrefix20210418\Nette\Caching\Storages\Journal
    {
    }
} elseif (!\interface_exists(\Typo3RectorPrefix20210418\Nette\Caching\Storages\IJournal::class)) {
    \class_alias(\Typo3RectorPrefix20210418\Nette\Caching\Storages\Journal::class, \Typo3RectorPrefix20210418\Nette\Caching\Storages\IJournal::class);
}
