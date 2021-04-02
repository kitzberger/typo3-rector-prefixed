<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210402\Symplify\SmartFileSystem\Tests\SmartFileSystem;

use Typo3RectorPrefix20210402\PHPUnit\Framework\TestCase;
use Typo3RectorPrefix20210402\Symplify\SmartFileSystem\SmartFileInfo;
use Typo3RectorPrefix20210402\Symplify\SmartFileSystem\SmartFileSystem;
final class SmartFileSystemTest extends \Typo3RectorPrefix20210402\PHPUnit\Framework\TestCase
{
    /**
     * @var SmartFileSystem
     */
    private $smartFileSystem;
    protected function setUp() : void
    {
        $this->smartFileSystem = new \Typo3RectorPrefix20210402\Symplify\SmartFileSystem\SmartFileSystem();
    }
    public function testReadFileToSmartFileInfo() : void
    {
        $readFileToSmartFileInfo = $this->smartFileSystem->readFileToSmartFileInfo(__DIR__ . '/Source/file.txt');
        $this->assertInstanceof(\Typo3RectorPrefix20210402\Symplify\SmartFileSystem\SmartFileInfo::class, $readFileToSmartFileInfo);
    }
}
