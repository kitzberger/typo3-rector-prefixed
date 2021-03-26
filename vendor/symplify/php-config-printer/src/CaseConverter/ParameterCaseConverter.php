<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210326\Symplify\PhpConfigPrinter\CaseConverter;

use PhpParser\Node\Expr;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Stmt\Expression;
use Typo3RectorPrefix20210326\Symplify\PhpConfigPrinter\Contract\CaseConverterInterface;
use Typo3RectorPrefix20210326\Symplify\PhpConfigPrinter\NodeFactory\ArgsNodeFactory;
use Typo3RectorPrefix20210326\Symplify\PhpConfigPrinter\NodeFactory\CommonNodeFactory;
use Typo3RectorPrefix20210326\Symplify\PhpConfigPrinter\Provider\CurrentFilePathProvider;
use Typo3RectorPrefix20210326\Symplify\PhpConfigPrinter\ValueObject\MethodName;
use Typo3RectorPrefix20210326\Symplify\PhpConfigPrinter\ValueObject\VariableName;
use Typo3RectorPrefix20210326\Symplify\PhpConfigPrinter\ValueObject\YamlKey;
/**
 * Handles this part:
 *
 * parameters: <---
 */
final class ParameterCaseConverter implements \Typo3RectorPrefix20210326\Symplify\PhpConfigPrinter\Contract\CaseConverterInterface
{
    /**
     * @var ArgsNodeFactory
     */
    private $argsNodeFactory;
    /**
     * @var CurrentFilePathProvider
     */
    private $currentFilePathProvider;
    /**
     * @var CommonNodeFactory
     */
    private $commonNodeFactory;
    public function __construct(\Typo3RectorPrefix20210326\Symplify\PhpConfigPrinter\NodeFactory\ArgsNodeFactory $argsNodeFactory, \Typo3RectorPrefix20210326\Symplify\PhpConfigPrinter\Provider\CurrentFilePathProvider $currentFilePathProvider, \Typo3RectorPrefix20210326\Symplify\PhpConfigPrinter\NodeFactory\CommonNodeFactory $commonNodeFactory)
    {
        $this->argsNodeFactory = $argsNodeFactory;
        $this->currentFilePathProvider = $currentFilePathProvider;
        $this->commonNodeFactory = $commonNodeFactory;
    }
    public function match(string $rootKey, $key, $values) : bool
    {
        return $rootKey === \Typo3RectorPrefix20210326\Symplify\PhpConfigPrinter\ValueObject\YamlKey::PARAMETERS;
    }
    public function convertToMethodCall($key, $values) : \PhpParser\Node\Stmt\Expression
    {
        if (\is_string($values)) {
            $values = $this->prefixWithDirConstantIfExistingPath($values);
        }
        if (\is_array($values)) {
            foreach ($values as $subKey => $subValue) {
                if (!\is_string($subValue)) {
                    continue;
                }
                $values[$subKey] = $this->prefixWithDirConstantIfExistingPath($subValue);
            }
        }
        $args = $this->argsNodeFactory->createFromValues([$key, $values]);
        $parametersVariable = new \PhpParser\Node\Expr\Variable(\Typo3RectorPrefix20210326\Symplify\PhpConfigPrinter\ValueObject\VariableName::PARAMETERS);
        $methodCall = new \PhpParser\Node\Expr\MethodCall($parametersVariable, \Typo3RectorPrefix20210326\Symplify\PhpConfigPrinter\ValueObject\MethodName::SET, $args);
        return new \PhpParser\Node\Stmt\Expression($methodCall);
    }
    /**
     * @return Expr|string
     */
    private function prefixWithDirConstantIfExistingPath(string $value)
    {
        $filePath = $this->currentFilePathProvider->getFilePath();
        if ($filePath === null) {
            return $value;
        }
        $configDirectory = \dirname($filePath);
        $possibleConfigPath = $configDirectory . '/' . $value;
        if (\is_file($possibleConfigPath)) {
            return $this->commonNodeFactory->createAbsoluteDirExpr($value);
        }
        if (\is_dir($possibleConfigPath)) {
            return $this->commonNodeFactory->createAbsoluteDirExpr($value);
        }
        return $value;
    }
}
