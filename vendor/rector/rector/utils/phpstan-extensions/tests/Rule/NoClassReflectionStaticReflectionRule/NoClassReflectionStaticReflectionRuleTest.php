<?php

declare (strict_types=1);
namespace Rector\PHPStanExtensions\Tests\Rule\NoClassReflectionStaticReflectionRule;

use Iterator;
use PHPStan\Rules\Rule;
use Rector\PHPStanExtensions\Rule\NoClassReflectionStaticReflectionRule;
use Typo3RectorPrefix20210415\Symplify\PHPStanExtensions\Testing\AbstractServiceAwareRuleTestCase;
final class NoClassReflectionStaticReflectionRuleTest extends \Typo3RectorPrefix20210415\Symplify\PHPStanExtensions\Testing\AbstractServiceAwareRuleTestCase
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
        $errorMessage = \Rector\PHPStanExtensions\Rule\NoClassReflectionStaticReflectionRule::ERROR_MESSAGE;
        (yield [__DIR__ . '/Fixture/NewOnExternal.php', [[$errorMessage, 13]]]);
        (yield [__DIR__ . '/Fixture/SkipAllowedType.php', []]);
        (yield [__DIR__ . '/Fixture/SkipNonReflectionNew.php', []]);
    }
    protected function getRule() : \PHPStan\Rules\Rule
    {
        return $this->getRuleFromConfig(\Rector\PHPStanExtensions\Rule\NoClassReflectionStaticReflectionRule::class, __DIR__ . '/config/configured_rule.neon');
    }
}
