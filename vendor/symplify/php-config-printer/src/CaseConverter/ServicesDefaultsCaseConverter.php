<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\CaseConverter;

use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Stmt\Expression;
use Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\Contract\CaseConverterInterface;
use Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\NodeFactory\Service\AutoBindNodeFactory;
use Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\ValueObject\MethodName;
use Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\ValueObject\VariableName;
use Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\ValueObject\YamlKey;
final class ServicesDefaultsCaseConverter implements \Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\Contract\CaseConverterInterface
{
    /**
     * @var AutoBindNodeFactory
     */
    private $autoBindNodeFactory;
    public function __construct(\Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\NodeFactory\Service\AutoBindNodeFactory $autoBindNodeFactory)
    {
        $this->autoBindNodeFactory = $autoBindNodeFactory;
    }
    public function convertToMethodCall($key, $values) : \PhpParser\Node\Stmt\Expression
    {
        $methodCall = new \PhpParser\Node\Expr\MethodCall($this->createServicesVariable(), \Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\ValueObject\MethodName::DEFAULTS);
        $methodCall = $this->autoBindNodeFactory->createAutoBindCalls($values, $methodCall, \Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\NodeFactory\Service\AutoBindNodeFactory::TYPE_DEFAULTS);
        return new \PhpParser\Node\Stmt\Expression($methodCall);
    }
    public function match(string $rootKey, $key, $values) : bool
    {
        if ($rootKey !== \Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\ValueObject\YamlKey::SERVICES) {
            return \false;
        }
        return $key === \Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\ValueObject\YamlKey::_DEFAULTS;
    }
    private function createServicesVariable() : \PhpParser\Node\Expr\Variable
    {
        return new \PhpParser\Node\Expr\Variable(\Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\ValueObject\VariableName::SERVICES);
    }
}
