<?php

declare (strict_types=1);
namespace Rector\Tests\ChangesReporting\Annotation\AppliedRectorsChangelogResolver;

use Rector\ChangesReporting\Annotation\RectorsChangelogResolver;
use Rector\ChangesReporting\ValueObject\RectorWithLineChange;
use Rector\Core\HttpKernel\RectorKernel;
use Rector\Core\ValueObject\Reporting\FileDiff;
use Rector\Tests\ChangesReporting\Annotation\AppliedRectorsChangelogResolver\Source\RectorWithChangelog;
use Rector\Tests\ChangesReporting\Annotation\AppliedRectorsChangelogResolver\Source\RectorWithOutChangelog;
use Typo3RectorPrefix20210422\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
use Typo3RectorPrefix20210422\Symplify\SmartFileSystem\SmartFileInfo;
final class RectorsChangelogResolverTest extends \Typo3RectorPrefix20210422\Symplify\PackageBuilder\Testing\AbstractKernelTestCase
{
    /**
     * @var RectorsChangelogResolver
     */
    private $rectorsChangelogResolver;
    /**
     * @var FileDiff
     */
    private $fileDiff;
    protected function setUp() : void
    {
        $this->bootKernel(\Rector\Core\HttpKernel\RectorKernel::class);
        $this->rectorsChangelogResolver = $this->getService(\Rector\ChangesReporting\Annotation\RectorsChangelogResolver::class);
        $this->fileDiff = $this->createFileDiff();
    }
    public function test() : void
    {
        $rectorsChangelogs = $this->rectorsChangelogResolver->resolve($this->fileDiff->getRectorClasses());
        $expectedRectorsChangelogs = [\Rector\Tests\ChangesReporting\Annotation\AppliedRectorsChangelogResolver\Source\RectorWithChangelog::class => 'https://github.com/rectorphp/rector/blob/master/docs/rector_rules_overview.md'];
        $this->assertSame($expectedRectorsChangelogs, $rectorsChangelogs);
    }
    private function createFileDiff() : \Rector\Core\ValueObject\Reporting\FileDiff
    {
        // This is by intention to test the array_unique functionality
        $rectorWithLineChanges = [];
        $rectorWithLineChanges[] = new \Rector\ChangesReporting\ValueObject\RectorWithLineChange(new \Rector\Tests\ChangesReporting\Annotation\AppliedRectorsChangelogResolver\Source\RectorWithChangelog(), 1);
        $rectorWithLineChanges[] = new \Rector\ChangesReporting\ValueObject\RectorWithLineChange(new \Rector\Tests\ChangesReporting\Annotation\AppliedRectorsChangelogResolver\Source\RectorWithChangelog(), 1);
        $rectorWithLineChanges[] = new \Rector\ChangesReporting\ValueObject\RectorWithLineChange(new \Rector\Tests\ChangesReporting\Annotation\AppliedRectorsChangelogResolver\Source\RectorWithOutChangelog(), 1);
        return new \Rector\Core\ValueObject\Reporting\FileDiff(new \Typo3RectorPrefix20210422\Symplify\SmartFileSystem\SmartFileInfo(__FILE__), 'foo', 'foo', $rectorWithLineChanges);
    }
}
