<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\PHPStan\Tests\Rules\AddCodeCoverageIgnoreForRectorDefinition;

use Iterator;
use PHPStan\Rules\Rule;
use Ssch\TYPO3Rector\PHPStan\Rules\AddCodeCoverageIgnoreForRectorDefinition;
use Ssch\TYPO3Rector\PHPStan\Tests\Rules\AddCodeCoverageIgnoreForRectorDefinition\Fixture\MissingCodeCoverageIgnore;
use Typo3RectorPrefix20210414\Symplify\PHPStanExtensions\Testing\AbstractServiceAwareRuleTestCase;
final class AddCodeCoverageIgnoreForRectorDefinitionTest extends \Typo3RectorPrefix20210414\Symplify\PHPStanExtensions\Testing\AbstractServiceAwareRuleTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function testRule(string $filePath, array $expectedErrorsWithLines) : void
    {
        $this->analyse([$filePath], $expectedErrorsWithLines);
    }
    public function provideData() : \Iterator
    {
        $message = \sprintf(\Ssch\TYPO3Rector\PHPStan\Rules\AddCodeCoverageIgnoreForRectorDefinition::ERROR_MESSAGE, \Ssch\TYPO3Rector\PHPStan\Tests\Rules\AddCodeCoverageIgnoreForRectorDefinition\Fixture\MissingCodeCoverageIgnore::class);
        (yield [__DIR__ . '/Fixture/MissingCodeCoverageIgnore.php', [[$message, 25]]]);
        (yield [__DIR__ . '/Fixture/SkipWithCodeCoverageIgnore.php', []]);
    }
    protected function getRule() : \PHPStan\Rules\Rule
    {
        return $this->getRuleFromConfig(\Ssch\TYPO3Rector\PHPStan\Rules\AddCodeCoverageIgnoreForRectorDefinition::class, __DIR__ . '/../../../config/typo3-rector.neon');
    }
}
