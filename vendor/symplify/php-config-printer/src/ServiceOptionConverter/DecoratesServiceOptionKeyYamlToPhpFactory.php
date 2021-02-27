<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210227\Symplify\PhpConfigPrinter\ServiceOptionConverter;

use PhpParser\Node\Expr\MethodCall;
use Typo3RectorPrefix20210227\Symfony\Component\DependencyInjection\ContainerInterface;
use Typo3RectorPrefix20210227\Symplify\PhpConfigPrinter\Contract\Converter\ServiceOptionsKeyYamlToPhpFactoryInterface;
use Typo3RectorPrefix20210227\Symplify\PhpConfigPrinter\NodeFactory\ArgsNodeFactory;
use Typo3RectorPrefix20210227\Symplify\PhpConfigPrinter\NodeFactory\CommonNodeFactory;
use Typo3RectorPrefix20210227\Symplify\PhpConfigPrinter\Sorter\YamlArgumentSorter;
use Typo3RectorPrefix20210227\Symplify\PhpConfigPrinter\ValueObject\YamlServiceKey;
final class DecoratesServiceOptionKeyYamlToPhpFactory implements \Typo3RectorPrefix20210227\Symplify\PhpConfigPrinter\Contract\Converter\ServiceOptionsKeyYamlToPhpFactoryInterface
{
    /**
     * @var string
     */
    private const DECORATION_ON_INVALID = 'decoration_on_invalid';
    /**
     * @var string
     */
    private const DECORATION_INNER_NAME = 'decoration_inner_name';
    /**
     * @var string
     */
    private const DECORATION_PRIORITY = 'decoration_priority';
    /**
     * @var ArgsNodeFactory
     */
    private $argsNodeFactory;
    /**
     * @var YamlArgumentSorter
     */
    private $yamlArgumentSorter;
    /**
     * @var CommonNodeFactory
     */
    private $commonNodeFactory;
    public function __construct(\Typo3RectorPrefix20210227\Symplify\PhpConfigPrinter\NodeFactory\ArgsNodeFactory $argsNodeFactory, \Typo3RectorPrefix20210227\Symplify\PhpConfigPrinter\Sorter\YamlArgumentSorter $yamlArgumentSorter, \Typo3RectorPrefix20210227\Symplify\PhpConfigPrinter\NodeFactory\CommonNodeFactory $commonNodeFactory)
    {
        $this->argsNodeFactory = $argsNodeFactory;
        $this->yamlArgumentSorter = $yamlArgumentSorter;
        $this->commonNodeFactory = $commonNodeFactory;
    }
    public function decorateServiceMethodCall($key, $yaml, $values, \PhpParser\Node\Expr\MethodCall $methodCall) : \PhpParser\Node\Expr\MethodCall
    {
        $arguments = $this->yamlArgumentSorter->sortArgumentsByKeyIfExists($values, [self::DECORATION_INNER_NAME => null, self::DECORATION_PRIORITY => 0, self::DECORATION_ON_INVALID => null]);
        if (isset($arguments[self::DECORATION_ON_INVALID])) {
            $arguments[self::DECORATION_ON_INVALID] = $arguments[self::DECORATION_ON_INVALID] === 'exception' ? $this->commonNodeFactory->createConstFetch(\Typo3RectorPrefix20210227\Symfony\Component\DependencyInjection\ContainerInterface::class, 'EXCEPTION_ON_INVALID_REFERENCE') : $this->commonNodeFactory->createConstFetch(\Typo3RectorPrefix20210227\Symfony\Component\DependencyInjection\ContainerInterface::class, 'IGNORE_ON_INVALID_REFERENCE');
        }
        // Don't write the next arguments if they are null.
        if ($arguments[self::DECORATION_ON_INVALID] === null && $arguments[self::DECORATION_PRIORITY] === 0) {
            unset($arguments[self::DECORATION_ON_INVALID], $arguments[self::DECORATION_PRIORITY]);
            if ($arguments[self::DECORATION_INNER_NAME] === null) {
                unset($arguments[self::DECORATION_INNER_NAME]);
            }
        }
        \array_unshift($arguments, $values['decorates']);
        $args = $this->argsNodeFactory->createFromValues($arguments);
        return new \PhpParser\Node\Expr\MethodCall($methodCall, 'decorate', $args);
    }
    public function isMatch($key, $values) : bool
    {
        return $key === \Typo3RectorPrefix20210227\Symplify\PhpConfigPrinter\ValueObject\YamlServiceKey::DECORATES;
    }
}
