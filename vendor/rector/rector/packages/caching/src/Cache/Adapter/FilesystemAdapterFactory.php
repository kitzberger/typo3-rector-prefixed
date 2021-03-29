<?php

declare (strict_types=1);
namespace Rector\Caching\Cache\Adapter;

use Typo3RectorPrefix20210329\Nette\Utils\Strings;
use Rector\Core\Configuration\Option;
use Typo3RectorPrefix20210329\Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Typo3RectorPrefix20210329\Symplify\PackageBuilder\Parameter\ParameterProvider;
final class FilesystemAdapterFactory
{
    /**
     * @var ParameterProvider
     */
    private $parameterProvider;
    public function __construct(\Typo3RectorPrefix20210329\Symplify\PackageBuilder\Parameter\ParameterProvider $parameterProvider)
    {
        $this->parameterProvider = $parameterProvider;
    }
    public function create() : \Typo3RectorPrefix20210329\Symfony\Component\Cache\Adapter\FilesystemAdapter
    {
        return new \Typo3RectorPrefix20210329\Symfony\Component\Cache\Adapter\FilesystemAdapter(
            // unique per project
            \Typo3RectorPrefix20210329\Nette\Utils\Strings::webalize(\getcwd()),
            0,
            $this->parameterProvider->provideParameter(\Rector\Core\Configuration\Option::CACHE_DIR)
        );
    }
}
