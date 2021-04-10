<?php

declare (strict_types=1);
namespace Rector\Tests\ChangesReporting\ValueObject;

use Iterator;
use Typo3RectorPrefix20210410\PHPUnit\Framework\TestCase;
use Rector\ChangesReporting\Annotation\AnnotationExtractor;
use Rector\ChangesReporting\ValueObject\RectorWithFileAndLineChange;
use Rector\Tests\ChangesReporting\ValueObject\Source\RectorWithChangelog;
use Rector\Tests\ChangesReporting\ValueObject\Source\RectorWithOutChangelog;
final class RectorWithFileAndLineChangeTest extends \Typo3RectorPrefix20210410\PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider rectorsWithFileAndLineChange
     */
    public function testGetRectorClassWithChangelogUrl(string $expected, \Rector\ChangesReporting\ValueObject\RectorWithFileAndLineChange $rectorWithFileAndLineChange) : void
    {
        $this->assertSame($expected, $rectorWithFileAndLineChange->getRectorClassWithChangelogUrl(new \Rector\ChangesReporting\Annotation\AnnotationExtractor()));
    }
    /**
     * @return Iterator<string[]|RectorWithFileAndLineChange[]<class-string<RectorWithOutChangelog>>>
     */
    public function rectorsWithFileAndLineChange() : \Iterator
    {
        (yield 'Rector with link' => ['Rector\\Tests\\ChangesReporting\\ValueObject\\Source\\RectorWithChangelog (https://github.com/rectorphp/rector/blob/master/docs/rector_rules_overview.md)', new \Rector\ChangesReporting\ValueObject\RectorWithFileAndLineChange(new \Rector\Tests\ChangesReporting\ValueObject\Source\RectorWithChangelog(), __DIR__ . '/Source/RectorWithLink.php', 1)]);
        (yield 'Rector without link' => ['Rector\\Tests\\ChangesReporting\\ValueObject\\Source\\RectorWithOutChangelog', new \Rector\ChangesReporting\ValueObject\RectorWithFileAndLineChange(new \Rector\Tests\ChangesReporting\ValueObject\Source\RectorWithOutChangelog(), __DIR__ . '/Source/RectorWithLink.php', 1)]);
    }
}
