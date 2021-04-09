<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210409\Symfony\Component\HttpKernel\DependencyInjection;

use Typo3RectorPrefix20210409\Psr\Log\LoggerInterface;
use Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\ContainerBuilder;
use Typo3RectorPrefix20210409\Symfony\Component\HttpKernel\Log\Logger;
/**
 * Registers the default logger if necessary.
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class LoggerPass implements \Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(\Typo3RectorPrefix20210409\Symfony\Component\DependencyInjection\ContainerBuilder $container)
    {
        $container->setAlias(\Typo3RectorPrefix20210409\Psr\Log\LoggerInterface::class, 'logger')->setPublic(\false);
        if ($container->has('logger')) {
            return;
        }
        $container->register('logger', \Typo3RectorPrefix20210409\Symfony\Component\HttpKernel\Log\Logger::class)->setPublic(\false);
    }
}
