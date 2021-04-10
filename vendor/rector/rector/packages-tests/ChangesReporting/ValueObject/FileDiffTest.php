<?php

declare (strict_types=1);
namespace Rector\Tests\ChangesReporting\ValueObject;

use Typo3RectorPrefix20210410\PHPUnit\Framework\TestCase;
use Rector\ChangesReporting\Annotation\AnnotationExtractor;
use Rector\ChangesReporting\ValueObject\RectorWithFileAndLineChange;
use Rector\Core\ValueObject\Reporting\FileDiff;
use Rector\Tests\ChangesReporting\ValueObject\Source\RectorWithChangelog;
use Rector\Tests\ChangesReporting\ValueObject\Source\RectorWithOutChangelog;
use Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo;
final class FileDiffTest extends \Typo3RectorPrefix20210410\PHPUnit\Framework\TestCase
{
    public function testGetRectorClasses() : void
    {
        $fileDiff = $this->createFileDiff();
        $this->assertSame([\Rector\Tests\ChangesReporting\ValueObject\Source\RectorWithChangelog::class, \Rector\Tests\ChangesReporting\ValueObject\Source\RectorWithOutChangelog::class], $fileDiff->getRectorClasses());
    }
    public function testGetRectorClassesWithChangelogUrlAndRectorClassAsKey() : void
    {
        $fileDiff = $this->createFileDiff();
        $this->assertSame(['Rector\\Tests\\ChangesReporting\\ValueObject\\Source\\RectorWithChangelog' => 'https://github.com/rectorphp/rector/blob/master/docs/rector_rules_overview.md'], $fileDiff->getRectorClassesWithChangelogUrlAndRectorClassAsKey(new \Rector\ChangesReporting\Annotation\AnnotationExtractor()));
    }
    public function testGetRectorClassesWithChangelogUrl() : void
    {
        $fileDiff = $this->createFileDiff();
        $this->assertSame(['Rector\\Tests\\ChangesReporting\\ValueObject\\Source\\RectorWithChangelog (https://github.com/rectorphp/rector/blob/master/docs/rector_rules_overview.md)', 'Rector\\Tests\\ChangesReporting\\ValueObject\\Source\\RectorWithOutChangelog'], $fileDiff->getRectorClassesWithChangelogUrl(new \Rector\ChangesReporting\Annotation\AnnotationExtractor()));
    }
    private function createFileDiff() : \Rector\Core\ValueObject\Reporting\FileDiff
    {
        // This is by intention to test the array_unique functionality
        $rectorWithFileAndLineChange1 = new \Rector\ChangesReporting\ValueObject\RectorWithFileAndLineChange(new \Rector\Tests\ChangesReporting\ValueObject\Source\RectorWithChangelog(), __DIR__ . '/Source/RectorWithChangelog.php', 1);
        $rectorWithFileAndLineChange2 = new \Rector\ChangesReporting\ValueObject\RectorWithFileAndLineChange(new \Rector\Tests\ChangesReporting\ValueObject\Source\RectorWithChangelog(), __DIR__ . '/Source/RectorWithChangelog.php', 1);
        $rectorWithFileAndLineChange3 = new \Rector\ChangesReporting\ValueObject\RectorWithFileAndLineChange(new \Rector\Tests\ChangesReporting\ValueObject\Source\RectorWithOutChangelog(), __DIR__ . '/Source/RectorWithOutChangelog.php', 1);
        $rectorWithFileAndLineChanges = [$rectorWithFileAndLineChange1, $rectorWithFileAndLineChange2, $rectorWithFileAndLineChange3];
        return new \Rector\Core\ValueObject\Reporting\FileDiff(new \Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo(__FILE__), 'foo', 'foo', $rectorWithFileAndLineChanges);
    }
}
