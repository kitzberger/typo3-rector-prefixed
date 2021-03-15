<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210315\Symplify\PhpConfigPrinter\CaseConverter;

use PhpParser\Node\Arg;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Stmt\Expression;
use Typo3RectorPrefix20210315\Symplify\PhpConfigPrinter\NodeFactory\CommonNodeFactory;
use Typo3RectorPrefix20210315\Symplify\PhpConfigPrinter\NodeFactory\Service\ServiceOptionNodeFactory;
use Typo3RectorPrefix20210315\Symplify\PhpConfigPrinter\ValueObject\MethodName;
use Typo3RectorPrefix20210315\Symplify\PhpConfigPrinter\ValueObject\VariableName;
use Typo3RectorPrefix20210315\Symplify\PhpConfigPrinter\ValueObject\YamlKey;
final class InstanceOfNestedCaseConverter
{
    /**
     * @var CommonNodeFactory
     */
    private $commonNodeFactory;
    /**
     * @var ServiceOptionNodeFactory
     */
    private $serviceOptionNodeFactory;
    public function __construct(\Typo3RectorPrefix20210315\Symplify\PhpConfigPrinter\NodeFactory\CommonNodeFactory $commonNodeFactory, \Typo3RectorPrefix20210315\Symplify\PhpConfigPrinter\NodeFactory\Service\ServiceOptionNodeFactory $serviceOptionNodeFactory)
    {
        $this->commonNodeFactory = $commonNodeFactory;
        $this->serviceOptionNodeFactory = $serviceOptionNodeFactory;
    }
    public function convertToMethodCall($key, $values) : \PhpParser\Node\Stmt\Expression
    {
        $classConstFetch = $this->commonNodeFactory->createClassReference($key);
        $servicesVariable = new \PhpParser\Node\Expr\Variable(\Typo3RectorPrefix20210315\Symplify\PhpConfigPrinter\ValueObject\VariableName::SERVICES);
        $args = [new \PhpParser\Node\Arg($classConstFetch)];
        $instanceofMethodCall = new \PhpParser\Node\Expr\MethodCall($servicesVariable, \Typo3RectorPrefix20210315\Symplify\PhpConfigPrinter\ValueObject\MethodName::INSTANCEOF, $args);
        $instanceofMethodCall = $this->serviceOptionNodeFactory->convertServiceOptionsToNodes($values, $instanceofMethodCall);
        return new \PhpParser\Node\Stmt\Expression($instanceofMethodCall);
    }
    public function isMatch(string $rootKey, $subKey) : bool
    {
        if ($rootKey !== \Typo3RectorPrefix20210315\Symplify\PhpConfigPrinter\ValueObject\YamlKey::SERVICES) {
            return \false;
        }
        if (!\is_string($subKey)) {
            return \false;
        }
        return $subKey === \Typo3RectorPrefix20210315\Symplify\PhpConfigPrinter\ValueObject\YamlKey::_INSTANCEOF;
    }
}
