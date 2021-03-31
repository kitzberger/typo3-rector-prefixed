<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210331\Symplify\PhpConfigPrinter\ServiceOptionConverter;

use PhpParser\Node\Arg;
use PhpParser\Node\Expr\MethodCall;
use Typo3RectorPrefix20210331\Symplify\PhpConfigPrinter\Contract\Converter\ServiceOptionsKeyYamlToPhpFactoryInterface;
use Typo3RectorPrefix20210331\Symplify\PhpConfigPrinter\NodeFactory\CommonNodeFactory;
use Typo3RectorPrefix20210331\Symplify\PhpConfigPrinter\ValueObject\YamlKey;
use Typo3RectorPrefix20210331\Symplify\PhpConfigPrinter\ValueObject\YamlServiceKey;
final class BindAutowireAutoconfigureServiceOptionKeyYamlToPhpFactory implements \Typo3RectorPrefix20210331\Symplify\PhpConfigPrinter\Contract\Converter\ServiceOptionsKeyYamlToPhpFactoryInterface
{
    /**
     * @var CommonNodeFactory
     */
    private $commonNodeFactory;
    public function __construct(\Typo3RectorPrefix20210331\Symplify\PhpConfigPrinter\NodeFactory\CommonNodeFactory $commonNodeFactory)
    {
        $this->commonNodeFactory = $commonNodeFactory;
    }
    public function decorateServiceMethodCall($key, $yaml, $values, \PhpParser\Node\Expr\MethodCall $methodCall) : \PhpParser\Node\Expr\MethodCall
    {
        $method = $key;
        if ($key === 'shared') {
            $method = 'share';
        }
        $methodCall = new \PhpParser\Node\Expr\MethodCall($methodCall, $method);
        if ($yaml === \false) {
            $methodCall->args[] = new \PhpParser\Node\Arg($this->commonNodeFactory->createFalse());
        }
        return $methodCall;
    }
    public function isMatch($key, $values) : bool
    {
        return \in_array($key, [\Typo3RectorPrefix20210331\Symplify\PhpConfigPrinter\ValueObject\YamlServiceKey::BIND, \Typo3RectorPrefix20210331\Symplify\PhpConfigPrinter\ValueObject\YamlKey::AUTOWIRE, \Typo3RectorPrefix20210331\Symplify\PhpConfigPrinter\ValueObject\YamlKey::AUTOCONFIGURE], \true);
    }
}
