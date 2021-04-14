<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210414\Symfony\Component\HttpKernel\Controller\ArgumentResolver;

use Typo3RectorPrefix20210414\Symfony\Component\HttpFoundation\Request;
use Typo3RectorPrefix20210414\Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Typo3RectorPrefix20210414\Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
/**
 * Yields the same instance as the request object passed along.
 *
 * @author Iltar van der Berg <kjarli@gmail.com>
 */
final class RequestValueResolver implements \Typo3RectorPrefix20210414\Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface
{
    /**
     * {@inheritdoc}
     */
    public function supports(\Typo3RectorPrefix20210414\Symfony\Component\HttpFoundation\Request $request, \Typo3RectorPrefix20210414\Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata $argument) : bool
    {
        return \Typo3RectorPrefix20210414\Symfony\Component\HttpFoundation\Request::class === $argument->getType() || \is_subclass_of($argument->getType(), \Typo3RectorPrefix20210414\Symfony\Component\HttpFoundation\Request::class);
    }
    /**
     * {@inheritdoc}
     */
    public function resolve(\Typo3RectorPrefix20210414\Symfony\Component\HttpFoundation\Request $request, \Typo3RectorPrefix20210414\Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata $argument) : iterable
    {
        (yield $request);
    }
}
