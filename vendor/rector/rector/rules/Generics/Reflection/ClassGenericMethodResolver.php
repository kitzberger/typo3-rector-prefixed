<?php

declare (strict_types=1);
namespace Rector\Generics\Reflection;

use Typo3RectorPrefix20210423\Nette\Utils\Strings;
use PHPStan\PhpDocParser\Ast\PhpDoc\MethodTagValueNode;
use PHPStan\Reflection\MethodReflection;
use Rector\Generics\TagValueNodeFactory\MethodTagValueNodeFactory;
use Rector\Generics\ValueObject\ChildParentClassReflections;
use Typo3RectorPrefix20210423\Symplify\SimplePhpDocParser\SimplePhpDocParser;
use Typo3RectorPrefix20210423\Symplify\SimplePhpDocParser\ValueObject\Ast\PhpDoc\SimplePhpDocNode;
final class ClassGenericMethodResolver
{
    /**
     * @var SimplePhpDocParser
     */
    private $simplePhpDocParser;
    /**
     * @var MethodTagValueNodeFactory
     */
    private $methodTagValueNodeFactory;
    public function __construct(\Typo3RectorPrefix20210423\Symplify\SimplePhpDocParser\SimplePhpDocParser $simplePhpDocParser, \Rector\Generics\TagValueNodeFactory\MethodTagValueNodeFactory $methodTagValueNodeFactory)
    {
        $this->simplePhpDocParser = $simplePhpDocParser;
        $this->methodTagValueNodeFactory = $methodTagValueNodeFactory;
    }
    /**
     * @return MethodTagValueNode[]
     */
    public function resolveFromClass(\Rector\Generics\ValueObject\ChildParentClassReflections $genericChildParentClassReflections) : array
    {
        $methodTagValueNodes = [];
        $classReflection = $genericChildParentClassReflections->getParentClassReflection();
        $templateNames = \array_keys($classReflection->getTemplateTags());
        foreach ($classReflection->getNativeMethods() as $methodReflection) {
            $parentMethodDocComment = $methodReflection->getDocComment();
            if ($parentMethodDocComment === null) {
                continue;
            }
            // how to parse?
            $parentMethodSimplePhpDocNode = $this->simplePhpDocParser->parseDocBlock($parentMethodDocComment);
            $methodTagValueNode = $this->resolveMethodTagValueNode($parentMethodSimplePhpDocNode, $templateNames, $methodReflection, $genericChildParentClassReflections);
            if (!$methodTagValueNode instanceof \PHPStan\PhpDocParser\Ast\PhpDoc\MethodTagValueNode) {
                continue;
            }
            $methodTagValueNodes[] = $methodTagValueNode;
        }
        return $methodTagValueNodes;
    }
    /**
     * @param string[] $templateNames
     */
    private function resolveMethodTagValueNode(\Typo3RectorPrefix20210423\Symplify\SimplePhpDocParser\ValueObject\Ast\PhpDoc\SimplePhpDocNode $simplePhpDocNode, array $templateNames, \PHPStan\Reflection\MethodReflection $methodReflection, \Rector\Generics\ValueObject\ChildParentClassReflections $genericChildParentClassReflections) : ?\PHPStan\PhpDocParser\Ast\PhpDoc\MethodTagValueNode
    {
        foreach ($simplePhpDocNode->getReturnTagValues() as $returnTagValueNode) {
            foreach ($templateNames as $templateName) {
                $typeAsString = (string) $returnTagValueNode->type;
                if (!\Typo3RectorPrefix20210423\Nette\Utils\Strings::match($typeAsString, '#\\b' . \preg_quote($templateName, '#') . '\\b#')) {
                    continue;
                }
                return $this->methodTagValueNodeFactory->createFromMethodReflectionAndReturnTagValueNode($methodReflection, $returnTagValueNode, $genericChildParentClassReflections);
            }
        }
        return null;
    }
}
