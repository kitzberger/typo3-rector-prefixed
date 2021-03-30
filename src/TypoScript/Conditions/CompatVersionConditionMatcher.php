<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\TypoScript\Conditions;

use Typo3RectorPrefix20210330\Nette\Utils\Strings;
final class CompatVersionConditionMatcher implements \Ssch\TYPO3Rector\TypoScript\Conditions\TyposcriptConditionMatcher
{
    /**
     * @var string
     */
    private const TYPE = 'compatVersion';
    public function change(string $condition) : ?string
    {
        \preg_match('#' . self::TYPE . self::ZERO_ONE_OR_MORE_WHITESPACES . '=' . self::ZERO_ONE_OR_MORE_WHITESPACES . '(?<value>.*)$#iUm', $condition, $matches);
        if (!\is_string($matches['value'])) {
            return $condition;
        }
        return \sprintf('compatVersion("%s")', \trim($matches['value']));
    }
    public function shouldApply(string $condition) : bool
    {
        return \Typo3RectorPrefix20210330\Nette\Utils\Strings::startsWith($condition, self::TYPE);
    }
}
