<?php

declare (strict_types=1);
namespace Rector\Composer\Tests\Rector;

use Typo3RectorPrefix20210227\Nette\Utils\Json;
use Rector\Composer\Modifier\ComposerModifier;
use Rector\Composer\Tests\Contract\ConfigFileAwareInterface;
use Rector\Core\HttpKernel\RectorKernel;
use Rector\Testing\Guard\FixtureGuard;
use Typo3RectorPrefix20210227\Symplify\ComposerJsonManipulator\ComposerJsonFactory;
use Typo3RectorPrefix20210227\Symplify\EasyTesting\StaticFixtureSplitter;
use Typo3RectorPrefix20210227\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
use Typo3RectorPrefix20210227\Symplify\SmartFileSystem\SmartFileInfo;
abstract class AbstractComposerRectorTestCase extends \Typo3RectorPrefix20210227\Symplify\PackageBuilder\Testing\AbstractKernelTestCase implements \Rector\Composer\Tests\Contract\ConfigFileAwareInterface
{
    /**
     * @var FixtureGuard
     */
    private $fixtureGuard;
    /**
     * @var ComposerJsonFactory
     */
    private $composerJsonFactory;
    /**
     * @var ComposerModifier
     */
    private $composerModifier;
    protected function setUp() : void
    {
        $this->bootKernelWithConfigs(\Rector\Core\HttpKernel\RectorKernel::class, [$this->provideConfigFile()]);
        $this->fixtureGuard = $this->getService(\Rector\Testing\Guard\FixtureGuard::class);
        $this->composerModifier = $this->getService(\Rector\Composer\Modifier\ComposerModifier::class);
        $this->composerJsonFactory = $this->getService(\Typo3RectorPrefix20210227\Symplify\ComposerJsonManipulator\ComposerJsonFactory::class);
    }
    protected function doTestFileInfo(\Typo3RectorPrefix20210227\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : void
    {
        $this->fixtureGuard->ensureFileInfoHasDifferentBeforeAndAfterContent($smartFileInfo);
        $inputFileInfoAndExpected = \Typo3RectorPrefix20210227\Symplify\EasyTesting\StaticFixtureSplitter::splitFileInfoToLocalInputAndExpected($smartFileInfo);
        $composerJson = $this->composerJsonFactory->createFromFileInfo($inputFileInfoAndExpected->getInputFileInfo());
        $this->composerModifier->modify($composerJson);
        $changedComposerJson = \Typo3RectorPrefix20210227\Nette\Utils\Json::encode($composerJson->getJsonArray(), \Typo3RectorPrefix20210227\Nette\Utils\Json::PRETTY);
        $this->assertJsonStringEqualsJsonString($inputFileInfoAndExpected->getExpected(), $changedComposerJson);
    }
}
