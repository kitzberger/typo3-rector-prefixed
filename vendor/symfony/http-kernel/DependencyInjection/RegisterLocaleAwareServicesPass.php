<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210329\Symfony\Component\HttpKernel\DependencyInjection;

use Typo3RectorPrefix20210329\Symfony\Component\DependencyInjection\Argument\IteratorArgument;
use Typo3RectorPrefix20210329\Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Typo3RectorPrefix20210329\Symfony\Component\DependencyInjection\ContainerBuilder;
use Typo3RectorPrefix20210329\Symfony\Component\DependencyInjection\Reference;
/**
 * Register all services that have the "kernel.locale_aware" tag into the listener.
 *
 * @author Pierre Bobiet <pierrebobiet@gmail.com>
 */
class RegisterLocaleAwareServicesPass implements \Typo3RectorPrefix20210329\Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface
{
    private $listenerServiceId;
    private $localeAwareTag;
    public function __construct(string $listenerServiceId = 'locale_aware_listener', string $localeAwareTag = 'kernel.locale_aware')
    {
        $this->listenerServiceId = $listenerServiceId;
        $this->localeAwareTag = $localeAwareTag;
    }
    public function process(\Typo3RectorPrefix20210329\Symfony\Component\DependencyInjection\ContainerBuilder $container)
    {
        if (!$container->hasDefinition($this->listenerServiceId)) {
            return;
        }
        $services = [];
        foreach ($container->findTaggedServiceIds($this->localeAwareTag) as $id => $tags) {
            $services[] = new \Typo3RectorPrefix20210329\Symfony\Component\DependencyInjection\Reference($id);
        }
        if (!$services) {
            $container->removeDefinition($this->listenerServiceId);
            return;
        }
        $container->getDefinition($this->listenerServiceId)->setArgument(0, new \Typo3RectorPrefix20210329\Symfony\Component\DependencyInjection\Argument\IteratorArgument($services));
    }
}
