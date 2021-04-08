<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210408\Symplify\PhpConfigPrinter\CaseConverter;

use PhpParser\Node\Stmt\Expression;
use Typo3RectorPrefix20210408\Symplify\PhpConfigPrinter\Contract\CaseConverterInterface;
use Typo3RectorPrefix20210408\Symplify\PhpConfigPrinter\NodeFactory\Service\ServicesPhpNodeFactory;
use Typo3RectorPrefix20210408\Symplify\PhpConfigPrinter\ValueObject\YamlKey;
final class ResourceCaseConverter implements \Typo3RectorPrefix20210408\Symplify\PhpConfigPrinter\Contract\CaseConverterInterface
{
    /**
     * @var ServicesPhpNodeFactory
     */
    private $servicesPhpNodeFactory;
    public function __construct(\Typo3RectorPrefix20210408\Symplify\PhpConfigPrinter\NodeFactory\Service\ServicesPhpNodeFactory $servicesPhpNodeFactory)
    {
        $this->servicesPhpNodeFactory = $servicesPhpNodeFactory;
    }
    public function convertToMethodCall($key, $values) : \PhpParser\Node\Stmt\Expression
    {
        // Due to the yaml behavior that does not allow the declaration of several identical key names.
        if (isset($values['namespace'])) {
            $key = $values['namespace'];
            unset($values['namespace']);
        }
        return $this->servicesPhpNodeFactory->createResource($key, $values);
    }
    public function match(string $rootKey, $key, $values) : bool
    {
        return isset($values[\Typo3RectorPrefix20210408\Symplify\PhpConfigPrinter\ValueObject\YamlKey::RESOURCE]);
    }
}
