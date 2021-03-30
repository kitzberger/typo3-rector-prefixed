<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210330\Symplify\SetConfigResolver;

use Typo3RectorPrefix20210330\Symplify\SetConfigResolver\Config\SetsParameterResolver;
use Typo3RectorPrefix20210330\Symplify\SetConfigResolver\Contract\SetProviderInterface;
use Typo3RectorPrefix20210330\Symplify\SmartFileSystem\SmartFileInfo;
/**
 * @see \Symplify\SetConfigResolver\Tests\ConfigResolver\SetAwareConfigResolverTest
 */
final class SetAwareConfigResolver extends \Typo3RectorPrefix20210330\Symplify\SetConfigResolver\AbstractConfigResolver
{
    /**
     * @var SetsParameterResolver
     */
    private $setsParameterResolver;
    /**
     * @var SetResolver
     */
    private $setResolver;
    public function __construct(\Typo3RectorPrefix20210330\Symplify\SetConfigResolver\Contract\SetProviderInterface $setProvider)
    {
        $this->setResolver = new \Typo3RectorPrefix20210330\Symplify\SetConfigResolver\SetResolver($setProvider);
        $this->setsParameterResolver = new \Typo3RectorPrefix20210330\Symplify\SetConfigResolver\Config\SetsParameterResolver($this->setResolver);
        parent::__construct();
    }
    /**
     * @param SmartFileInfo[] $fileInfos
     * @return SmartFileInfo[]
     */
    public function resolveFromParameterSetsFromConfigFiles(array $fileInfos) : array
    {
        return $this->setsParameterResolver->resolveFromFileInfos($fileInfos);
    }
}
