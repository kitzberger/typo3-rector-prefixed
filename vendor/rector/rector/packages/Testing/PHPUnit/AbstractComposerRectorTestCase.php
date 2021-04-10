<?php

declare (strict_types=1);
namespace Rector\Testing\PHPUnit;

use Typo3RectorPrefix20210410\Nette\Utils\Json;
use Rector\Composer\Modifier\ComposerModifier;
use Rector\Core\HttpKernel\RectorKernel;
use Rector\Testing\Contract\ConfigFileAwareInterface;
use Typo3RectorPrefix20210410\Symplify\ComposerJsonManipulator\ComposerJsonFactory;
use Typo3RectorPrefix20210410\Symplify\EasyTesting\StaticFixtureSplitter;
use Typo3RectorPrefix20210410\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
use Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo;
abstract class AbstractComposerRectorTestCase extends \Typo3RectorPrefix20210410\Symplify\PackageBuilder\Testing\AbstractKernelTestCase implements \Rector\Testing\Contract\ConfigFileAwareInterface
{
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
        $this->composerModifier = $this->getService(\Rector\Composer\Modifier\ComposerModifier::class);
        $this->composerJsonFactory = $this->getService(\Typo3RectorPrefix20210410\Symplify\ComposerJsonManipulator\ComposerJsonFactory::class);
    }
    protected function doTestFileInfo(\Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : void
    {
        $inputFileInfoAndExpected = \Typo3RectorPrefix20210410\Symplify\EasyTesting\StaticFixtureSplitter::splitFileInfoToLocalInputAndExpected($smartFileInfo);
        $composerJson = $this->composerJsonFactory->createFromFileInfo($inputFileInfoAndExpected->getInputFileInfo());
        $this->composerModifier->modify($composerJson);
        $changedComposerJson = \Typo3RectorPrefix20210410\Nette\Utils\Json::encode($composerJson->getJsonArray(), \Typo3RectorPrefix20210410\Nette\Utils\Json::PRETTY);
        $this->assertJsonStringEqualsJsonString($inputFileInfoAndExpected->getExpected(), $changedComposerJson);
    }
}
