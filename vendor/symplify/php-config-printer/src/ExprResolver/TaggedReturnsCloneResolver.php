<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210317\Symplify\PhpConfigPrinter\ExprResolver;

use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ArrayItem;
use Typo3RectorPrefix20210317\Symfony\Component\Yaml\Tag\TaggedValue;
use Typo3RectorPrefix20210317\Symplify\PhpConfigPrinter\Configuration\SymfonyFunctionNameProvider;
final class TaggedReturnsCloneResolver
{
    /**
     * @var ServiceReferenceExprResolver
     */
    private $serviceReferenceExprResolver;
    /**
     * @var SymfonyFunctionNameProvider
     */
    private $symfonyFunctionNameProvider;
    public function __construct(\Typo3RectorPrefix20210317\Symplify\PhpConfigPrinter\Configuration\SymfonyFunctionNameProvider $symfonyFunctionNameProvider, \Typo3RectorPrefix20210317\Symplify\PhpConfigPrinter\ExprResolver\ServiceReferenceExprResolver $serviceReferenceExprResolver)
    {
        $this->serviceReferenceExprResolver = $serviceReferenceExprResolver;
        $this->symfonyFunctionNameProvider = $symfonyFunctionNameProvider;
    }
    public function resolve(\Typo3RectorPrefix20210317\Symfony\Component\Yaml\Tag\TaggedValue $taggedValue) : \PhpParser\Node\Expr\Array_
    {
        $serviceName = $taggedValue->getValue()[0];
        $functionName = $this->symfonyFunctionNameProvider->provideRefOrService();
        $funcCall = $this->serviceReferenceExprResolver->resolveServiceReferenceExpr($serviceName, \false, $functionName);
        return new \PhpParser\Node\Expr\Array_([new \PhpParser\Node\Expr\ArrayItem($funcCall)]);
    }
}
