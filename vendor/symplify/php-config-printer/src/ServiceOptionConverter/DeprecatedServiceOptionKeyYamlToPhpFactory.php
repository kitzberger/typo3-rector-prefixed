<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\ServiceOptionConverter;

use PhpParser\Node\Expr\MethodCall;
use Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\Contract\Converter\ServiceOptionsKeyYamlToPhpFactoryInterface;
use Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\NodeFactory\ArgsNodeFactory;
use Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\ValueObject\YamlServiceKey;
final class DeprecatedServiceOptionKeyYamlToPhpFactory implements \Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\Contract\Converter\ServiceOptionsKeyYamlToPhpFactoryInterface
{
    /**
     * @var ArgsNodeFactory
     */
    private $argsNodeFactory;
    public function __construct(\Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\NodeFactory\ArgsNodeFactory $argsNodeFactory)
    {
        $this->argsNodeFactory = $argsNodeFactory;
    }
    public function decorateServiceMethodCall($key, $yaml, $values, \PhpParser\Node\Expr\MethodCall $methodCall) : \PhpParser\Node\Expr\MethodCall
    {
        // the old, simple format
        if (!\is_array($yaml)) {
            $args = $this->argsNodeFactory->createFromValues([$yaml]);
        } else {
            $items = [$yaml['package'] ?? '', $yaml['version'] ?? '', $yaml['message'] ?? ''];
            $args = $this->argsNodeFactory->createFromValues($items);
        }
        return new \PhpParser\Node\Expr\MethodCall($methodCall, 'deprecate', $args);
    }
    public function isMatch($key, $values) : bool
    {
        return $key === \Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\ValueObject\YamlServiceKey::DEPRECATED;
    }
}
