<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */
declare (strict_types=1);
namespace Typo3RectorPrefix20210409\Nette\Caching\Storages;

use Typo3RectorPrefix20210409\Nette;
/**
 * Cache dummy storage.
 */
class DevNullStorage implements \Typo3RectorPrefix20210409\Nette\Caching\Storage
{
    use Nette\SmartObject;
    public function read(string $key)
    {
    }
    public function lock(string $key) : void
    {
    }
    public function write(string $key, $data, array $dependencies) : void
    {
    }
    public function remove(string $key) : void
    {
    }
    public function clean(array $conditions) : void
    {
    }
}
