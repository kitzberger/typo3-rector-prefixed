<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210326\Symfony\Component\HttpKernel\Controller\ArgumentResolver;

use Typo3RectorPrefix20210326\Symfony\Component\HttpFoundation\Request;
use Typo3RectorPrefix20210326\Symfony\Component\HttpFoundation\Session\SessionInterface;
use Typo3RectorPrefix20210326\Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Typo3RectorPrefix20210326\Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
/**
 * Yields the Session.
 *
 * @author Iltar van der Berg <kjarli@gmail.com>
 */
final class SessionValueResolver implements \Typo3RectorPrefix20210326\Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface
{
    /**
     * {@inheritdoc}
     */
    public function supports(\Typo3RectorPrefix20210326\Symfony\Component\HttpFoundation\Request $request, \Typo3RectorPrefix20210326\Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata $argument) : bool
    {
        if (!$request->hasSession()) {
            return \false;
        }
        $type = $argument->getType();
        if (\Typo3RectorPrefix20210326\Symfony\Component\HttpFoundation\Session\SessionInterface::class !== $type && !\is_subclass_of($type, \Typo3RectorPrefix20210326\Symfony\Component\HttpFoundation\Session\SessionInterface::class)) {
            return \false;
        }
        return $request->getSession() instanceof $type;
    }
    /**
     * {@inheritdoc}
     */
    public function resolve(\Typo3RectorPrefix20210326\Symfony\Component\HttpFoundation\Request $request, \Typo3RectorPrefix20210326\Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata $argument) : iterable
    {
        (yield $request->getSession());
    }
}
