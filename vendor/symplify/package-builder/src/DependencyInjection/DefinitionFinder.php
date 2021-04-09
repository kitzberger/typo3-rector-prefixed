<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210409\Symplify\PackageBuilder\DependencyInjection;

use Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\ContainerBuilder;
use Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Definition;
use Typo3RectorPrefix20210409\Symplify\PackageBuilder\Exception\DependencyInjection\DefinitionForTypeNotFoundException;
use Throwable;
/**
 * @see \Symplify\PackageBuilder\Tests\DependencyInjection\DefinitionFinderTest
 */
final class DefinitionFinder
{
    /**
     * @return Definition[]
     */
    public function findAllByType(\Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder, string $type) : array
    {
        $definitions = [];
        $containerBuilderDefinitions = $containerBuilder->getDefinitions();
        foreach ($containerBuilderDefinitions as $name => $definition) {
            $class = $definition->getClass() ?: $name;
            if (!$this->doesClassExists($class)) {
                continue;
            }
            if (\is_a($class, $type, \true)) {
                $definitions[$name] = $definition;
            }
        }
        return $definitions;
    }
    public function getByType(\Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder, string $type) : \Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Definition
    {
        $definition = $this->getByTypeIfExists($containerBuilder, $type);
        if ($definition !== null) {
            return $definition;
        }
        throw new \Typo3RectorPrefix20210409\Symplify\PackageBuilder\Exception\DependencyInjection\DefinitionForTypeNotFoundException(\sprintf('Definition for type "%s" was not found.', $type));
    }
    private function getByTypeIfExists(\Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder, string $type) : ?\Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Definition
    {
        $containerBuilderDefinitions = $containerBuilder->getDefinitions();
        foreach ($containerBuilderDefinitions as $name => $definition) {
            $class = $definition->getClass() ?: $name;
            if (!$this->doesClassExists($class)) {
                continue;
            }
            if (\is_a($class, $type, \true)) {
                return $definition;
            }
        }
        return null;
    }
    private function doesClassExists(string $class) : bool
    {
        try {
            return \class_exists($class);
        } catch (\Throwable $throwable) {
            return \false;
        }
    }
}
