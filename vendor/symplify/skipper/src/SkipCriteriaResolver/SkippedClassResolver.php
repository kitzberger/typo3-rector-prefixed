<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210329\Symplify\Skipper\SkipCriteriaResolver;

use Typo3RectorPrefix20210329\Symplify\PackageBuilder\Parameter\ParameterProvider;
use Typo3RectorPrefix20210329\Symplify\PackageBuilder\Reflection\ClassLikeExistenceChecker;
use Typo3RectorPrefix20210329\Symplify\Skipper\ValueObject\Option;
final class SkippedClassResolver
{
    /**
     * @var array<string, string[]|null>
     */
    private $skippedClasses = [];
    /**
     * @var ParameterProvider
     */
    private $parameterProvider;
    /**
     * @var ClassLikeExistenceChecker
     */
    private $classLikeExistenceChecker;
    public function __construct(\Typo3RectorPrefix20210329\Symplify\PackageBuilder\Parameter\ParameterProvider $parameterProvider, \Typo3RectorPrefix20210329\Symplify\PackageBuilder\Reflection\ClassLikeExistenceChecker $classLikeExistenceChecker)
    {
        $this->parameterProvider = $parameterProvider;
        $this->classLikeExistenceChecker = $classLikeExistenceChecker;
    }
    /**
     * @return array<string, string[]|null>
     */
    public function resolve() : array
    {
        if ($this->skippedClasses !== []) {
            return $this->skippedClasses;
        }
        $skip = $this->parameterProvider->provideArrayParameter(\Typo3RectorPrefix20210329\Symplify\Skipper\ValueObject\Option::SKIP);
        foreach ($skip as $key => $value) {
            // e.g. [SomeClass::class] → shift values to [SomeClass::class => null]
            if (\is_int($key)) {
                $key = $value;
                $value = null;
            }
            if (!\is_string($key)) {
                continue;
            }
            if (!$this->classLikeExistenceChecker->doesClassLikeExist($key)) {
                continue;
            }
            $this->skippedClasses[$key] = $value;
        }
        return $this->skippedClasses;
    }
}
