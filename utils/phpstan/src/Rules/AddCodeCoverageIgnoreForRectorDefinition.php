<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\PHPStan\Rules;

use Typo3RectorPrefix20210414\Nette\Utils\Strings;
use PhpParser\Node;
use PhpParser\Node\Stmt\ClassMethod;
use PHPStan\Analyser\Scope;
use PHPStan\Broker\Broker;
use PHPStan\Rules\Rule;
use PHPStan\ShouldNotHappenException;
use PHPStan\Type\FileTypeMapper;
use Rector\Core\Contract\Rector\PhpRectorInterface;
/**
 * @see \Ssch\TYPO3Rector\PHPStan\Tests\Rules\AddCodeCoverageIgnoreForRectorDefinition\AddCodeCoverageIgnoreForRectorDefinitionTest
 */
final class AddCodeCoverageIgnoreForRectorDefinition implements \PHPStan\Rules\Rule
{
    /**
     * @var string
     */
    public const ERROR_MESSAGE = 'Provide @codeCoverageIgnore doc block for "%s" RectorDefinition method';
    /**
     * @var Broker
     */
    private $broker;
    /**
     * @var FileTypeMapper
     */
    private $fileTypeMapper;
    public function __construct(\PHPStan\Broker\Broker $broker, \PHPStan\Type\FileTypeMapper $fileTypeMapper)
    {
        $this->broker = $broker;
        $this->fileTypeMapper = $fileTypeMapper;
    }
    public function getNodeType() : string
    {
        return \PhpParser\Node\Stmt\ClassMethod::class;
    }
    /**
     * @param Node|ClassMethod $node
     *
     * @return string[]
     */
    public function processNode(\PhpParser\Node $node, \PHPStan\Analyser\Scope $scope) : array
    {
        if (!$scope->isInClass()) {
            throw new \PHPStan\ShouldNotHappenException();
        }
        $classReflection = $scope->getClassReflection();
        if (null === $classReflection) {
            return [];
        }
        if (!$classReflection->isSubclassOf(\Rector\Core\Contract\Rector\PhpRectorInterface::class)) {
            return [];
        }
        $methodName = $node->name->toString();
        if ('getRuleDefinition' !== $methodName) {
            return [];
        }
        $className = $classReflection->getName();
        $docComment = $node->getDocComment();
        if (null === $docComment) {
            return [\sprintf(self::ERROR_MESSAGE, $className)];
        }
        $resolvedPhpDoc = $this->fileTypeMapper->getResolvedPhpDoc($scope->getFile(), $classReflection->getName(), null, $methodName, $docComment->getText());
        $phpDocString = $resolvedPhpDoc->getPhpDocString();
        if (\Typo3RectorPrefix20210414\Nette\Utils\Strings::contains($phpDocString, '@codeCoverageIgnore')) {
            return [];
        }
        return [\sprintf(self::ERROR_MESSAGE, $className)];
    }
}
