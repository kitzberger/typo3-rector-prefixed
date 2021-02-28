<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210228\Symplify\PhpConfigPrinter\CaseConverter;

use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Stmt\Expression;
use Typo3RectorPrefix20210228\Symplify\PhpConfigPrinter\Contract\CaseConverterInterface;
use Typo3RectorPrefix20210228\Symplify\PhpConfigPrinter\NodeFactory\ArgsNodeFactory;
use Typo3RectorPrefix20210228\Symplify\PhpConfigPrinter\NodeFactory\Service\ServiceOptionNodeFactory;
use Typo3RectorPrefix20210228\Symplify\PhpConfigPrinter\ValueObject\MethodName;
use Typo3RectorPrefix20210228\Symplify\PhpConfigPrinter\ValueObject\VariableName;
use Typo3RectorPrefix20210228\Symplify\PhpConfigPrinter\ValueObject\YamlKey;
/**
 * Handles this part:
 *
 * services:
 *     Some:
 *         class: Other <---
 */
final class ClassServiceCaseConverter implements \Typo3RectorPrefix20210228\Symplify\PhpConfigPrinter\Contract\CaseConverterInterface
{
    /**
     * @var ArgsNodeFactory
     */
    private $argsNodeFactory;
    /**
     * @var ServiceOptionNodeFactory
     */
    private $serviceOptionNodeFactory;
    public function __construct(\Typo3RectorPrefix20210228\Symplify\PhpConfigPrinter\NodeFactory\ArgsNodeFactory $argsNodeFactory, \Typo3RectorPrefix20210228\Symplify\PhpConfigPrinter\NodeFactory\Service\ServiceOptionNodeFactory $serviceOptionNodeFactory)
    {
        $this->argsNodeFactory = $argsNodeFactory;
        $this->serviceOptionNodeFactory = $serviceOptionNodeFactory;
    }
    public function convertToMethodCall($key, $values) : \PhpParser\Node\Stmt\Expression
    {
        $args = $this->argsNodeFactory->createFromValues([$key, $values[\Typo3RectorPrefix20210228\Symplify\PhpConfigPrinter\ValueObject\YamlKey::CLASS_KEY]]);
        $setMethodCall = new \PhpParser\Node\Expr\MethodCall(new \PhpParser\Node\Expr\Variable(\Typo3RectorPrefix20210228\Symplify\PhpConfigPrinter\ValueObject\VariableName::SERVICES), \Typo3RectorPrefix20210228\Symplify\PhpConfigPrinter\ValueObject\MethodName::SET, $args);
        unset($values[\Typo3RectorPrefix20210228\Symplify\PhpConfigPrinter\ValueObject\YamlKey::CLASS_KEY]);
        $setMethodCall = $this->serviceOptionNodeFactory->convertServiceOptionsToNodes($values, $setMethodCall);
        return new \PhpParser\Node\Stmt\Expression($setMethodCall);
    }
    public function match(string $rootKey, $key, $values) : bool
    {
        if ($rootKey !== \Typo3RectorPrefix20210228\Symplify\PhpConfigPrinter\ValueObject\YamlKey::SERVICES) {
            return \false;
        }
        if (\is_array($values) && \count($values) !== 1) {
            return \false;
        }
        if (!isset($values[\Typo3RectorPrefix20210228\Symplify\PhpConfigPrinter\ValueObject\YamlKey::CLASS_KEY])) {
            return \false;
        }
        return !isset($values[\Typo3RectorPrefix20210228\Symplify\PhpConfigPrinter\ValueObject\YamlKey::ALIAS]);
    }
}
