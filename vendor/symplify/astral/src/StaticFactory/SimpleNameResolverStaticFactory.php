<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210326\Symplify\Astral\StaticFactory;

use Typo3RectorPrefix20210326\Symplify\Astral\Naming\SimpleNameResolver;
use Typo3RectorPrefix20210326\Symplify\Astral\NodeNameResolver\ArgNodeNameResolver;
use Typo3RectorPrefix20210326\Symplify\Astral\NodeNameResolver\AttributeNodeNameResolver;
use Typo3RectorPrefix20210326\Symplify\Astral\NodeNameResolver\ClassLikeNodeNameResolver;
use Typo3RectorPrefix20210326\Symplify\Astral\NodeNameResolver\ClassMethodNodeNameResolver;
use Typo3RectorPrefix20210326\Symplify\Astral\NodeNameResolver\ConstFetchNodeNameResolver;
use Typo3RectorPrefix20210326\Symplify\Astral\NodeNameResolver\FuncCallNodeNameResolver;
use Typo3RectorPrefix20210326\Symplify\Astral\NodeNameResolver\IdentifierNodeNameResolver;
use Typo3RectorPrefix20210326\Symplify\Astral\NodeNameResolver\NamespaceNodeNameResolver;
use Typo3RectorPrefix20210326\Symplify\Astral\NodeNameResolver\ParamNodeNameResolver;
use Typo3RectorPrefix20210326\Symplify\Astral\NodeNameResolver\PropertyNodeNameResolver;
/**
 * This would be normally handled by standard Symfony or Nette DI, but PHPStan does not use any of those, so we have to
 * make it manually.
 */
final class SimpleNameResolverStaticFactory
{
    public static function create() : \Typo3RectorPrefix20210326\Symplify\Astral\Naming\SimpleNameResolver
    {
        $nameResolvers = [new \Typo3RectorPrefix20210326\Symplify\Astral\NodeNameResolver\ArgNodeNameResolver(), new \Typo3RectorPrefix20210326\Symplify\Astral\NodeNameResolver\AttributeNodeNameResolver(), new \Typo3RectorPrefix20210326\Symplify\Astral\NodeNameResolver\ClassLikeNodeNameResolver(), new \Typo3RectorPrefix20210326\Symplify\Astral\NodeNameResolver\ClassMethodNodeNameResolver(), new \Typo3RectorPrefix20210326\Symplify\Astral\NodeNameResolver\ConstFetchNodeNameResolver(), new \Typo3RectorPrefix20210326\Symplify\Astral\NodeNameResolver\FuncCallNodeNameResolver(), new \Typo3RectorPrefix20210326\Symplify\Astral\NodeNameResolver\IdentifierNodeNameResolver(), new \Typo3RectorPrefix20210326\Symplify\Astral\NodeNameResolver\NamespaceNodeNameResolver(), new \Typo3RectorPrefix20210326\Symplify\Astral\NodeNameResolver\ParamNodeNameResolver(), new \Typo3RectorPrefix20210326\Symplify\Astral\NodeNameResolver\PropertyNodeNameResolver()];
        return new \Typo3RectorPrefix20210326\Symplify\Astral\Naming\SimpleNameResolver($nameResolvers);
    }
}
