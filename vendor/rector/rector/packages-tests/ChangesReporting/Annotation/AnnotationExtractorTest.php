<?php

declare (strict_types=1);
namespace Rector\Tests\ChangesReporting\Annotation;

use Iterator;
use Typo3RectorPrefix20210410\PHPUnit\Framework\TestCase;
use Rector\ChangesReporting\Annotation\AnnotationExtractor;
use Rector\Tests\ChangesReporting\ValueObject\Source\RectorWithChangelog;
use Rector\Tests\ChangesReporting\ValueObject\Source\RectorWithOutChangelog;
final class AnnotationExtractorTest extends \Typo3RectorPrefix20210410\PHPUnit\Framework\TestCase
{
    /**
     * @var AnnotationExtractor
     */
    private $annotationExtractor;
    protected function setUp() : void
    {
        $this->annotationExtractor = new \Rector\ChangesReporting\Annotation\AnnotationExtractor();
    }
    public function extractAnnotationProvider() : \Iterator
    {
        $rectorWithChangelog = new \Rector\Tests\ChangesReporting\ValueObject\Source\RectorWithChangelog();
        (yield 'Class with changelog annotation' => [\get_class($rectorWithChangelog), '@changelog', 'https://github.com/rectorphp/rector/blob/master/docs/rector_rules_overview.md']);
        $rectorWithOutChangelog = new \Rector\Tests\ChangesReporting\ValueObject\Source\RectorWithOutChangelog();
        (yield 'Class without changelog annotation' => [\get_class($rectorWithOutChangelog), '@changelog', null]);
    }
    /**
     * @dataProvider extractAnnotationProvider
     */
    public function testExtractAnnotationFromClass(string $className, string $annotation, ?string $expected) : void
    {
        $value = $this->annotationExtractor->extractAnnotationFromClass($className, $annotation);
        $this->assertSame($expected, $value);
    }
}
