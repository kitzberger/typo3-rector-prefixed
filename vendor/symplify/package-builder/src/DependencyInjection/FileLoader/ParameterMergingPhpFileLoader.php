<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423\Symplify\PackageBuilder\DependencyInjection\FileLoader;

use Typo3RectorPrefix20210423\Symfony\Component\Config\FileLocatorInterface;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\ContainerBuilder;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Typo3RectorPrefix20210423\Symplify\PackageBuilder\Yaml\ParametersMerger;
/**
 * The need:
 * - https://github.com/symfony/symfony/issues/26713
 * - https://github.com/symfony/symfony/pull/21313#issuecomment-372037445
 */
final class ParameterMergingPhpFileLoader extends \Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\PhpFileLoader
{
    /**
     * @var ParametersMerger
     */
    private $parametersMerger;
    public function __construct(\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder, \Typo3RectorPrefix20210423\Symfony\Component\Config\FileLocatorInterface $fileLocator)
    {
        $this->parametersMerger = new \Typo3RectorPrefix20210423\Symplify\PackageBuilder\Yaml\ParametersMerger();
        parent::__construct($containerBuilder, $fileLocator);
    }
    /**
     * Same as parent, just merging parameters instead overriding them
     *
     * @see https://github.com/symplify/symplify/pull/697
     *
     * @param string|null $type
     */
    public function load($resource, $type = null) : void
    {
        // get old parameters
        $parameterBag = $this->container->getParameterBag();
        $oldParameters = $parameterBag->all();
        parent::load($resource);
        foreach ($oldParameters as $key => $oldValue) {
            $newValue = $this->parametersMerger->merge($oldValue, $this->container->getParameter($key));
            $this->container->setParameter($key, $newValue);
        }
    }
}
