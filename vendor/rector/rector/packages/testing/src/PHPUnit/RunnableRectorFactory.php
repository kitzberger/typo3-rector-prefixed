<?php

declare (strict_types=1);
namespace Rector\Testing\PHPUnit;

use Typo3RectorPrefix20210401\Nette\Utils\Random;
use Typo3RectorPrefix20210401\Nette\Utils\Strings;
use PhpParser\NodeFinder;
use Rector\Testing\Contract\RunnableInterface;
use Rector\Testing\PHPUnit\Runnable\ClassLikeNamesSuffixer;
use Rector\Testing\PHPUnit\Runnable\RunnableClassFinder;
use Typo3RectorPrefix20210401\Symplify\SmartFileSystem\SmartFileInfo;
use Typo3RectorPrefix20210401\Symplify\SmartFileSystem\SmartFileSystem;
final class RunnableRectorFactory
{
    /**
     * @var RunnableClassFinder
     */
    private $runnableClassFinder;
    /**
     * @var ClassLikeNamesSuffixer
     */
    private $classLikeNamesSuffixer;
    /**
     * @var SmartFileSystem
     */
    private $smartFileSystem;
    public function __construct()
    {
        $this->runnableClassFinder = new \Rector\Testing\PHPUnit\Runnable\RunnableClassFinder(new \PhpParser\NodeFinder());
        $this->classLikeNamesSuffixer = new \Rector\Testing\PHPUnit\Runnable\ClassLikeNamesSuffixer();
        $this->smartFileSystem = new \Typo3RectorPrefix20210401\Symplify\SmartFileSystem\SmartFileSystem();
    }
    public function createRunnableClass(\Typo3RectorPrefix20210401\Symplify\SmartFileSystem\SmartFileInfo $classContentFileInfo) : \Rector\Testing\Contract\RunnableInterface
    {
        $temporaryPath = $this->createTemporaryPathWithPrefix($classContentFileInfo);
        $contents = $classContentFileInfo->getContents();
        $temporaryClassSuffix = $this->getTemporaryClassSuffix();
        $suffixedFileContent = $this->classLikeNamesSuffixer->suffixContent($contents, $temporaryClassSuffix);
        $this->smartFileSystem->dumpFile($temporaryPath, $suffixedFileContent);
        include_once $temporaryPath;
        $runnableFullyQualifiedClassName = $this->runnableClassFinder->find($suffixedFileContent);
        return new $runnableFullyQualifiedClassName();
    }
    private function createTemporaryPathWithPrefix(\Typo3RectorPrefix20210401\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : string
    {
        // warning: if this hash is too short, the file can becom "identical"; took me 1 hour to find out
        $hash = \Typo3RectorPrefix20210401\Nette\Utils\Strings::substring(\md5($smartFileInfo->getRealPath()), -15);
        return \sprintf(\sys_get_temp_dir() . '/_rector_runnable_%s_%s', $hash, $smartFileInfo->getBasename('.inc'));
    }
    private function getTemporaryClassSuffix() : string
    {
        return \Typo3RectorPrefix20210401\Nette\Utils\Random::generate(30);
    }
}
