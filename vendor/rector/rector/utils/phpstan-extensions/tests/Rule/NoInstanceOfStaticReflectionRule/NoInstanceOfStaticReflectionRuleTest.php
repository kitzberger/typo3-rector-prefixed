<?php

declare (strict_types=1);
namespace Rector\PHPStanExtensions\Tests\Rule\NoInstanceOfStaticReflectionRule;

use Iterator;
use PHPStan\Rules\Rule;
use Rector\PHPStanExtensions\Rule\NoInstanceOfStaticReflectionRule;
use Typo3RectorPrefix20210422\Symplify\PHPStanExtensions\Testing\AbstractServiceAwareRuleTestCase;
final class NoInstanceOfStaticReflectionRuleTest extends \Typo3RectorPrefix20210422\Symplify\PHPStanExtensions\Testing\AbstractServiceAwareRuleTestCase
{
    /**
     * @dataProvider provideData()
     * @param array<string|string[]|int[]> $expectedErrorsWithLines
     */
    public function testRule(string $filePath, array $expectedErrorsWithLines) : void
    {
        $this->analyse([$filePath], $expectedErrorsWithLines);
    }
    public function provideData() : \Iterator
    {
        $errorMessage = \Rector\PHPStanExtensions\Rule\NoInstanceOfStaticReflectionRule::ERROR_MESSAGE;
        (yield [__DIR__ . '/Fixture/InstanceofWithType.php', [[$errorMessage, 13]]]);
        $errorMessage = \Rector\PHPStanExtensions\Rule\NoInstanceOfStaticReflectionRule::ERROR_MESSAGE;
        (yield [__DIR__ . '/Fixture/IsAWithType.php', [[$errorMessage, 13]]]);
        (yield [__DIR__ . '/Fixture/SkipAllowedType.php', []]);
        (yield [__DIR__ . '/Fixture/SkipGenericNodeType.php', []]);
        (yield [__DIR__ . '/Fixture/SkipIsAGenericClassString.php', []]);
        (yield [__DIR__ . '/Fixture/SkipIsAsClassString.php', []]);
        (yield [__DIR__ . '/Fixture/SkipFileInfo.php', []]);
        (yield [__DIR__ . '/Fixture/SkipArrayClassString.php', []]);
        (yield [__DIR__ . '/Fixture/SkipReflection.php', []]);
        (yield [__DIR__ . '/Fixture/SkipDateTime.php', []]);
        (yield [__DIR__ . '/Fixture/SkipTypesArray.php', []]);
        (yield [__DIR__ . '/Fixture/SkipSymfony.php', []]);
    }
    protected function getRule() : \PHPStan\Rules\Rule
    {
        return $this->getRuleFromConfig(\Rector\PHPStanExtensions\Rule\NoInstanceOfStaticReflectionRule::class, __DIR__ . '/config/configured_rule.neon');
    }
}
