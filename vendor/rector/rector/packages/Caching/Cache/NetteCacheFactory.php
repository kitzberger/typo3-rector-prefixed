<?php

declare (strict_types=1);
namespace Rector\Caching\Cache;

use Typo3RectorPrefix20210421\Nette\Caching\Cache;
use Typo3RectorPrefix20210421\Nette\Caching\Storages\FileStorage;
use Typo3RectorPrefix20210421\Nette\Utils\Strings;
use Rector\Core\Configuration\Option;
use Typo3RectorPrefix20210421\Symplify\PackageBuilder\Parameter\ParameterProvider;
use Typo3RectorPrefix20210421\Symplify\SmartFileSystem\SmartFileSystem;
final class NetteCacheFactory
{
    /**
     * @var ParameterProvider
     */
    private $parameterProvider;
    /**
     * @var SmartFileSystem
     */
    private $smartFileSystem;
    public function __construct(\Typo3RectorPrefix20210421\Symplify\PackageBuilder\Parameter\ParameterProvider $parameterProvider, \Typo3RectorPrefix20210421\Symplify\SmartFileSystem\SmartFileSystem $smartFileSystem)
    {
        $this->parameterProvider = $parameterProvider;
        $this->smartFileSystem = $smartFileSystem;
    }
    public function create() : \Typo3RectorPrefix20210421\Nette\Caching\Cache
    {
        $cacheDirectory = $this->parameterProvider->provideStringParameter(\Rector\Core\Configuration\Option::CACHE_DIR);
        // ensure cache directory exists
        if (!$this->smartFileSystem->exists($cacheDirectory)) {
            $this->smartFileSystem->mkdir($cacheDirectory);
        }
        $fileStorage = new \Typo3RectorPrefix20210421\Nette\Caching\Storages\FileStorage($cacheDirectory);
        // namespace is unique per project
        $namespace = \Typo3RectorPrefix20210421\Nette\Utils\Strings::webalize(\getcwd());
        return new \Typo3RectorPrefix20210421\Nette\Caching\Cache($fileStorage, $namespace);
    }
}
