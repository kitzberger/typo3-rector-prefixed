<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210401\Symplify\PackageBuilder\Contract\HttpKernel;

use Typo3RectorPrefix20210401\Symfony\Component\HttpKernel\KernelInterface;
use Typo3RectorPrefix20210401\Symplify\SmartFileSystem\SmartFileInfo;
interface ExtraConfigAwareKernelInterface extends \Typo3RectorPrefix20210401\Symfony\Component\HttpKernel\KernelInterface
{
    /**
     * @param string[]|SmartFileInfo[] $configs
     */
    public function setConfigs(array $configs) : void;
}
