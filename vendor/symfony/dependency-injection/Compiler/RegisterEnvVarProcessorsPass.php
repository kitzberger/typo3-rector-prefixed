<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Compiler;

use Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\ContainerBuilder;
use Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\EnvVarProcessor;
use Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\EnvVarProcessorInterface;
use Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\ParameterBag\EnvPlaceholderParameterBag;
use Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Reference;
/**
 * Creates the container.env_var_processors_locator service.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class RegisterEnvVarProcessorsPass implements \Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface
{
    private const ALLOWED_TYPES = ['array', 'bool', 'float', 'int', 'string'];
    public function process(\Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\ContainerBuilder $container)
    {
        $bag = $container->getParameterBag();
        $types = [];
        $processors = [];
        foreach ($container->findTaggedServiceIds('container.env_var_processor') as $id => $tags) {
            if (!($r = $container->getReflectionClass($class = $container->getDefinition($id)->getClass()))) {
                throw new \Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException(\sprintf('Class "%s" used for service "%s" cannot be found.', $class, $id));
            } elseif (!$r->isSubclassOf(\Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\EnvVarProcessorInterface::class)) {
                throw new \Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException(\sprintf('Service "%s" must implement interface "%s".', $id, \Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\EnvVarProcessorInterface::class));
            }
            foreach ($class::getProvidedTypes() as $prefix => $type) {
                $processors[$prefix] = new \Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Reference($id);
                $types[$prefix] = self::validateProvidedTypes($type, $class);
            }
        }
        if ($bag instanceof \Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\ParameterBag\EnvPlaceholderParameterBag) {
            foreach (\Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\EnvVarProcessor::getProvidedTypes() as $prefix => $type) {
                if (!isset($types[$prefix])) {
                    $types[$prefix] = self::validateProvidedTypes($type, \Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\EnvVarProcessor::class);
                }
            }
            $bag->setProvidedTypes($types);
        }
        if ($processors) {
            $container->setAlias('container.env_var_processors_locator', (string) \Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Compiler\ServiceLocatorTagPass::register($container, $processors))->setPublic(\true);
        }
    }
    private static function validateProvidedTypes(string $types, string $class) : array
    {
        $types = \explode('|', $types);
        foreach ($types as $type) {
            if (!\in_array($type, self::ALLOWED_TYPES)) {
                throw new \Typo3RectorPrefix20210421\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException(\sprintf('Invalid type "%s" returned by "%s::getProvidedTypes()", expected one of "%s".', $type, $class, \implode('", "', self::ALLOWED_TYPES)));
            }
        }
        return $types;
    }
}
