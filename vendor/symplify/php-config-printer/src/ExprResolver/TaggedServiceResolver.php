<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210407\Symplify\PhpConfigPrinter\ExprResolver;

use PhpParser\Node\Expr;
use Typo3RectorPrefix20210407\Symfony\Component\Yaml\Tag\TaggedValue;
use Typo3RectorPrefix20210407\Symplify\PhpConfigPrinter\ValueObject\FunctionName;
final class TaggedServiceResolver
{
    /**
     * @var ServiceReferenceExprResolver
     */
    private $serviceReferenceExprResolver;
    public function __construct(\Typo3RectorPrefix20210407\Symplify\PhpConfigPrinter\ExprResolver\ServiceReferenceExprResolver $serviceReferenceExprResolver)
    {
        $this->serviceReferenceExprResolver = $serviceReferenceExprResolver;
    }
    public function resolve(\Typo3RectorPrefix20210407\Symfony\Component\Yaml\Tag\TaggedValue $taggedValue) : \PhpParser\Node\Expr
    {
        $serviceName = $taggedValue->getValue()['class'];
        $functionName = \Typo3RectorPrefix20210407\Symplify\PhpConfigPrinter\ValueObject\FunctionName::INLINE_SERVICE;
        return $this->serviceReferenceExprResolver->resolveServiceReferenceExpr($serviceName, \false, $functionName);
    }
}
