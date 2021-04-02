<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\NodeFactory\Service;

use PhpParser\Node\Arg;
use PhpParser\Node\Expr\MethodCall;
use Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\Contract\SymfonyVersionFeatureGuardInterface;
use Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\Converter\ServiceOptionsKeyYamlToPhpFactory\TagsServiceOptionKeyYamlToPhpFactory;
use Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\NodeFactory\ArgsNodeFactory;
use Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\NodeFactory\CommonNodeFactory;
use Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\ValueObject\SymfonyVersionFeature;
use Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\ValueObject\YamlKey;
final class AutoBindNodeFactory
{
    /**
     * @var string
     */
    public const TYPE_SERVICE = 'service';
    /**
     * @var string
     */
    public const TYPE_DEFAULTS = 'defaults';
    /**
     * @var CommonNodeFactory
     */
    private $commonNodeFactory;
    /**
     * @var ArgsNodeFactory
     */
    private $argsNodeFactory;
    /**
     * @var SymfonyVersionFeatureGuardInterface
     */
    private $symfonyVersionFeatureGuard;
    /**
     * @var TagsServiceOptionKeyYamlToPhpFactory
     */
    private $tagsServiceOptionKeyYamlToPhpFactory;
    public function __construct(\Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\NodeFactory\CommonNodeFactory $commonNodeFactory, \Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\NodeFactory\ArgsNodeFactory $argsNodeFactory, \Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\Contract\SymfonyVersionFeatureGuardInterface $symfonyVersionFeatureGuard, \Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\Converter\ServiceOptionsKeyYamlToPhpFactory\TagsServiceOptionKeyYamlToPhpFactory $tagsServiceOptionKeyYamlToPhpFactory)
    {
        $this->commonNodeFactory = $commonNodeFactory;
        $this->argsNodeFactory = $argsNodeFactory;
        $this->symfonyVersionFeatureGuard = $symfonyVersionFeatureGuard;
        $this->tagsServiceOptionKeyYamlToPhpFactory = $tagsServiceOptionKeyYamlToPhpFactory;
    }
    /**
     * Decorated node with:
     * ->autowire()
     * ->autoconfigure()
     * ->bind()
     */
    public function createAutoBindCalls(array $yaml, \PhpParser\Node\Expr\MethodCall $methodCall, string $type) : \PhpParser\Node\Expr\MethodCall
    {
        foreach ($yaml as $key => $value) {
            if ($key === \Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\ValueObject\YamlKey::AUTOWIRE) {
                $methodCall = $this->createAutowire($value, $methodCall, $type);
            }
            if ($key === \Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\ValueObject\YamlKey::AUTOCONFIGURE) {
                $methodCall = $this->createAutoconfigure($value, $methodCall, $type);
            }
            if ($key === \Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\ValueObject\YamlKey::PUBLIC) {
                $methodCall = $this->createPublicPrivate($value, $methodCall, $type);
            }
            if ($key === \Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\ValueObject\YamlKey::BIND) {
                $methodCall = $this->createBindMethodCall($methodCall, $yaml[\Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\ValueObject\YamlKey::BIND]);
            }
            if ($key === \Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\ValueObject\YamlKey::TAGS) {
                $methodCall = $this->createTagsMethodCall($methodCall, $value);
            }
        }
        return $methodCall;
    }
    private function createBindMethodCall(\PhpParser\Node\Expr\MethodCall $methodCall, array $bindValues) : \PhpParser\Node\Expr\MethodCall
    {
        foreach ($bindValues as $key => $value) {
            $args = $this->argsNodeFactory->createFromValues([$key, $value]);
            $methodCall = new \PhpParser\Node\Expr\MethodCall($methodCall, \Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\ValueObject\YamlKey::BIND, $args);
        }
        return $methodCall;
    }
    private function createAutowire($value, \PhpParser\Node\Expr\MethodCall $methodCall, string $type) : \PhpParser\Node\Expr\MethodCall
    {
        if ($value === \true) {
            return new \PhpParser\Node\Expr\MethodCall($methodCall, \Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\ValueObject\YamlKey::AUTOWIRE);
        }
        // skip default false
        if ($type === self::TYPE_DEFAULTS) {
            return $methodCall;
        }
        $args = [new \PhpParser\Node\Arg($this->commonNodeFactory->createFalse())];
        return new \PhpParser\Node\Expr\MethodCall($methodCall, \Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\ValueObject\YamlKey::AUTOWIRE, $args);
    }
    private function createAutoconfigure($value, \PhpParser\Node\Expr\MethodCall $methodCall, string $type) : \PhpParser\Node\Expr\MethodCall
    {
        if ($value === \true) {
            return new \PhpParser\Node\Expr\MethodCall($methodCall, \Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\ValueObject\YamlKey::AUTOCONFIGURE);
        }
        // skip default false
        if ($type === self::TYPE_DEFAULTS) {
            return $methodCall;
        }
        $args = [new \PhpParser\Node\Arg($this->commonNodeFactory->createFalse())];
        return new \PhpParser\Node\Expr\MethodCall($methodCall, \Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\ValueObject\YamlKey::AUTOCONFIGURE, $args);
    }
    private function createPublicPrivate($value, \PhpParser\Node\Expr\MethodCall $methodCall, string $type) : \PhpParser\Node\Expr\MethodCall
    {
        if ($value !== \false) {
            return new \PhpParser\Node\Expr\MethodCall($methodCall, 'public');
        }
        // default value
        if ($type === self::TYPE_DEFAULTS) {
            if ($this->symfonyVersionFeatureGuard->isAtLeastSymfonyVersion(\Typo3RectorPrefix20210402\Symplify\PhpConfigPrinter\ValueObject\SymfonyVersionFeature::PRIVATE_SERVICES_BY_DEFAULT)) {
                return $methodCall;
            }
            return new \PhpParser\Node\Expr\MethodCall($methodCall, 'private');
        }
        $args = [new \PhpParser\Node\Arg($this->commonNodeFactory->createFalse())];
        return new \PhpParser\Node\Expr\MethodCall($methodCall, 'public', $args);
    }
    private function createTagsMethodCall(\PhpParser\Node\Expr\MethodCall $methodCall, $value) : \PhpParser\Node\Expr\MethodCall
    {
        return $this->tagsServiceOptionKeyYamlToPhpFactory->decorateServiceMethodCall(null, $value, [], $methodCall);
    }
}
