<?php

declare (strict_types=1);
namespace Rector\NetteKdyby;

use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\NullableType;
use PhpParser\Node\Param;
use PHPStan\Type\MixedType;
use PHPStan\Type\Type;
use Rector\Core\Exception\ShouldNotHappenException;
use Rector\Core\PhpParser\Comparing\NodeComparator;
use Rector\NetteKdyby\Naming\VariableNaming;
use Rector\NetteKdyby\ValueObject\EventAndListenerTree;
use Rector\NodeNameResolver\NodeNameResolver;
use Rector\StaticTypeMapper\StaticTypeMapper;
final class ContributeEventClassResolver
{
    /**
     * @var string[][]
     */
    private const CONTRIBUTTE_EVENT_GETTER_METHODS_WITH_TYPE = [
        // application
        'Typo3RectorPrefix20210402\\Contributte\\Events\\Extra\\Event\\Application\\ShutdownEvent' => ['Typo3RectorPrefix20210402\\Nette\\Application\\Application' => 'getApplication', 'Throwable' => 'getThrowable'],
        'Typo3RectorPrefix20210402\\Contributte\\Events\\Extra\\Event\\Application\\StartupEvent' => ['Typo3RectorPrefix20210402\\Nette\\Application\\Application' => 'getApplication'],
        'Typo3RectorPrefix20210402\\Contributte\\Events\\Extra\\Event\\Application\\ErrorEvent' => ['Typo3RectorPrefix20210402\\Nette\\Application\\Application' => 'getApplication', 'Throwable' => 'getThrowable'],
        'Typo3RectorPrefix20210402\\Contributte\\Events\\Extra\\Event\\Application\\PresenterEvent' => ['Typo3RectorPrefix20210402\\Nette\\Application\\Application' => 'getApplication', 'Typo3RectorPrefix20210402\\Nette\\Application\\IPresenter' => 'getPresenter'],
        'Typo3RectorPrefix20210402\\Contributte\\Events\\Extra\\Event\\Application\\RequestEvent' => ['Typo3RectorPrefix20210402\\Nette\\Application\\Application' => 'getApplication', 'Typo3RectorPrefix20210402\\Nette\\Application\\Request' => 'getRequest'],
        'Typo3RectorPrefix20210402\\Contributte\\Events\\Extra\\Event\\Application\\ResponseEvent' => ['Typo3RectorPrefix20210402\\Nette\\Application\\Application' => 'getApplication', 'Typo3RectorPrefix20210402\\Nette\\Application\\IResponse' => 'getResponse'],
        // presenter
        'Typo3RectorPrefix20210402\\Contributte\\Events\\Extra\\Event\\Application\\PresenterShutdownEvent' => ['Typo3RectorPrefix20210402\\Nette\\Application\\IPresenter' => 'getPresenter', 'Typo3RectorPrefix20210402\\Nette\\Application\\IResponse' => 'getResponse'],
        'Typo3RectorPrefix20210402\\Contributte\\Events\\Extra\\Event\\Application\\PresenterStartupEvent' => ['Typo3RectorPrefix20210402\\Nette\\Application\\UI\\Presenter' => 'getPresenter'],
        // nette/security
        'Typo3RectorPrefix20210402\\Contributte\\Events\\Extra\\Event\\Security\\LoggedInEvent' => ['Typo3RectorPrefix20210402\\Nette\\Security\\User' => 'getUser'],
        'Typo3RectorPrefix20210402\\Contributte\\Events\\Extra\\Event\\Security\\LoggedOutEvent' => ['Typo3RectorPrefix20210402\\Nette\\Security\\User' => 'getUser'],
        // latte
        'Typo3RectorPrefix20210402\\Contributte\\Events\\Extra\\Event\\Latte\\LatteCompileEvent' => ['Typo3RectorPrefix20210402\\Latte\\Engine' => 'getEngine'],
        'Typo3RectorPrefix20210402\\Contributte\\Events\\Extra\\Event\\Latte\\TemplateCreateEvent' => ['Typo3RectorPrefix20210402\\Nette\\Bridges\\ApplicationLatte\\Template' => 'getTemplate'],
    ];
    /**
     * @var NodeNameResolver
     */
    private $nodeNameResolver;
    /**
     * @var VariableNaming
     */
    private $variableNaming;
    /**
     * @var StaticTypeMapper
     */
    private $staticTypeMapper;
    /**
     * @var NodeComparator
     */
    private $nodeComparator;
    public function __construct(\Rector\NodeNameResolver\NodeNameResolver $nodeNameResolver, \Rector\StaticTypeMapper\StaticTypeMapper $staticTypeMapper, \Rector\NetteKdyby\Naming\VariableNaming $variableNaming, \Rector\Core\PhpParser\Comparing\NodeComparator $nodeComparator)
    {
        $this->nodeNameResolver = $nodeNameResolver;
        $this->variableNaming = $variableNaming;
        $this->staticTypeMapper = $staticTypeMapper;
        $this->nodeComparator = $nodeComparator;
    }
    public function resolveGetterMethodByEventClassAndParam(string $eventClass, \PhpParser\Node\Param $param, ?\Rector\NetteKdyby\ValueObject\EventAndListenerTree $eventAndListenerTree = null) : string
    {
        $getterMethodsWithType = self::CONTRIBUTTE_EVENT_GETTER_METHODS_WITH_TYPE[$eventClass] ?? null;
        $paramType = $param->type;
        // unwrap nullable type
        if ($paramType instanceof \PhpParser\Node\NullableType) {
            $paramType = $paramType->type;
        }
        if ($eventAndListenerTree !== null) {
            $getterMethodBlueprints = $eventAndListenerTree->getGetterMethodBlueprints();
            foreach ($getterMethodBlueprints as $getterMethodBlueprint) {
                if (!$getterMethodBlueprint->getReturnTypeNode() instanceof \PhpParser\Node\Name) {
                    continue;
                }
                if ($this->nodeComparator->areNodesEqual($getterMethodBlueprint->getReturnTypeNode(), $paramType)) {
                    return $getterMethodBlueprint->getMethodName();
                }
            }
        }
        if ($paramType === null || $paramType instanceof \PhpParser\Node\Identifier) {
            if ($paramType === null) {
                $staticType = new \PHPStan\Type\MixedType();
            } else {
                $staticType = $this->staticTypeMapper->mapPhpParserNodePHPStanType($paramType);
            }
            return $this->createGetterFromParamAndStaticType($param, $staticType);
        }
        $type = $this->nodeNameResolver->getName($paramType);
        if ($type === null) {
            throw new \Rector\Core\Exception\ShouldNotHappenException();
        }
        // system contribute event
        if (isset($getterMethodsWithType[$type])) {
            return $getterMethodsWithType[$type];
        }
        $paramName = $this->nodeNameResolver->getName($param->var);
        if ($eventAndListenerTree !== null) {
            $getterMethodBlueprints = $eventAndListenerTree->getGetterMethodBlueprints();
            foreach ($getterMethodBlueprints as $getterMethodBlueprint) {
                if ($getterMethodBlueprint->getVariableName() === $paramName) {
                    return $getterMethodBlueprint->getMethodName();
                }
            }
        }
        $staticType = $this->staticTypeMapper->mapPhpParserNodePHPStanType($paramType);
        return $this->createGetterFromParamAndStaticType($param, $staticType);
    }
    private function createGetterFromParamAndStaticType(\PhpParser\Node\Param $param, \PHPStan\Type\Type $type) : string
    {
        $variableName = $this->variableNaming->resolveFromNodeAndType($param, $type);
        if ($variableName === null) {
            throw new \Rector\Core\Exception\ShouldNotHappenException();
        }
        return 'get' . \ucfirst($variableName);
    }
}
