<?php

declare (strict_types=1);
namespace Rector\Core\Tests\Php\PhpVersionResolver\ProjectComposerJsonPhpVersionResolver;

use Iterator;
use Rector\Core\Php\PhpVersionResolver\ProjectComposerJsonPhpVersionResolver;
use Rector\Testing\PHPUnit\AbstractTestCase;
final class ProjectComposerJsonPhpVersionResolverTest extends \Rector\Testing\PHPUnit\AbstractTestCase
{
    /**
     * @var ProjectComposerJsonPhpVersionResolver
     */
    private $projectComposerJsonPhpVersionResolver;
    protected function setUp() : void
    {
        $this->boot();
        $this->projectComposerJsonPhpVersionResolver = $this->getService(\Rector\Core\Php\PhpVersionResolver\ProjectComposerJsonPhpVersionResolver::class);
    }
    /**
     * @dataProvider provideData()
     */
    public function test(string $composerJsonFilePath, int $expectedPhpVersion) : void
    {
        $resolvePhpVersion = $this->projectComposerJsonPhpVersionResolver->resolve($composerJsonFilePath);
        $this->assertSame($expectedPhpVersion, $resolvePhpVersion);
    }
    public function provideData() : \Iterator
    {
        (yield [__DIR__ . '/Fixture/some_composer.json', 70300]);
        (yield [__DIR__ . '/Fixture/some_composer_with_platform.json', 70400]);
    }
}
