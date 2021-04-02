<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210402\Symplify\Skipper\SkipVoter;

use Typo3RectorPrefix20210402\Symplify\PackageBuilder\Parameter\ParameterProvider;
use Typo3RectorPrefix20210402\Symplify\PackageBuilder\Reflection\ClassLikeExistenceChecker;
use Typo3RectorPrefix20210402\Symplify\Skipper\Contract\SkipVoterInterface;
use Typo3RectorPrefix20210402\Symplify\Skipper\SkipCriteriaResolver\SkippedClassResolver;
use Typo3RectorPrefix20210402\Symplify\Skipper\Skipper\OnlySkipper;
use Typo3RectorPrefix20210402\Symplify\Skipper\Skipper\SkipSkipper;
use Typo3RectorPrefix20210402\Symplify\Skipper\ValueObject\Option;
use Typo3RectorPrefix20210402\Symplify\SmartFileSystem\SmartFileInfo;
final class ClassSkipVoter implements \Typo3RectorPrefix20210402\Symplify\Skipper\Contract\SkipVoterInterface
{
    /**
     * @var ClassLikeExistenceChecker
     */
    private $classLikeExistenceChecker;
    /**
     * @var ParameterProvider
     */
    private $parameterProvider;
    /**
     * @var SkipSkipper
     */
    private $skipSkipper;
    /**
     * @var OnlySkipper
     */
    private $onlySkipper;
    /**
     * @var SkippedClassResolver
     */
    private $skippedClassResolver;
    public function __construct(\Typo3RectorPrefix20210402\Symplify\PackageBuilder\Reflection\ClassLikeExistenceChecker $classLikeExistenceChecker, \Typo3RectorPrefix20210402\Symplify\PackageBuilder\Parameter\ParameterProvider $parameterProvider, \Typo3RectorPrefix20210402\Symplify\Skipper\Skipper\SkipSkipper $skipSkipper, \Typo3RectorPrefix20210402\Symplify\Skipper\Skipper\OnlySkipper $onlySkipper, \Typo3RectorPrefix20210402\Symplify\Skipper\SkipCriteriaResolver\SkippedClassResolver $skippedClassResolver)
    {
        $this->classLikeExistenceChecker = $classLikeExistenceChecker;
        $this->parameterProvider = $parameterProvider;
        $this->skipSkipper = $skipSkipper;
        $this->onlySkipper = $onlySkipper;
        $this->skippedClassResolver = $skippedClassResolver;
    }
    /**
     * @param string|object $element
     */
    public function match($element) : bool
    {
        if (\is_object($element)) {
            return \true;
        }
        return $this->classLikeExistenceChecker->doesClassLikeExist($element);
    }
    /**
     * @param string|object $element
     */
    public function shouldSkip($element, \Typo3RectorPrefix20210402\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : bool
    {
        $only = $this->parameterProvider->provideArrayParameter(\Typo3RectorPrefix20210402\Symplify\Skipper\ValueObject\Option::ONLY);
        $doesMatchOnly = $this->onlySkipper->doesMatchOnly($element, $smartFileInfo, $only);
        if (\is_bool($doesMatchOnly)) {
            return $doesMatchOnly;
        }
        $skippedClasses = $this->skippedClassResolver->resolve();
        return $this->skipSkipper->doesMatchSkip($element, $smartFileInfo, $skippedClasses);
    }
}
