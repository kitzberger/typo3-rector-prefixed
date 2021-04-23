<?php

declare (strict_types=1);
namespace Rector\Tests\ChangesReporting\Annotation;

use Iterator;
use Typo3RectorPrefix20210423\PHPUnit\Framework\TestCase;
use Rector\ChangesReporting\Annotation\AnnotationExtractor;
use Rector\Tests\ChangesReporting\Annotation\AppliedRectorsChangelogResolver\Source\RectorWithChangelog;
use Rector\Tests\ChangesReporting\Annotation\AppliedRectorsChangelogResolver\Source\RectorWithOutChangelog;
final class AnnotationExtractorTest extends \Typo3RectorPrefix20210423\PHPUnit\Framework\TestCase
{
    /**
     * @var AnnotationExtractor
     */
    private $annotationExtractor;
    protected function setUp() : void
    {
        $this->annotationExtractor = new \Rector\ChangesReporting\Annotation\AnnotationExtractor();
    }
    /**
     * @dataProvider extractAnnotationProvider()
     */
    public function testExtractAnnotationFromClass(string $className, string $annotation, ?string $expected) : void
    {
        $value = $this->annotationExtractor->extractAnnotationFromClass($className, $annotation);
        $this->assertSame($expected, $value);
    }
    public function extractAnnotationProvider() : \Iterator
    {
        (yield 'Class with changelog annotation' => [\Rector\Tests\ChangesReporting\Annotation\AppliedRectorsChangelogResolver\Source\RectorWithChangelog::class, '@changelog', 'https://github.com/rectorphp/rector/blob/master/docs/rector_rules_overview.md']);
        (yield 'Class without changelog annotation' => [\Rector\Tests\ChangesReporting\Annotation\AppliedRectorsChangelogResolver\Source\RectorWithOutChangelog::class, '@changelog', null]);
    }
}
