<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\TypoScript\Conditions;

use Typo3RectorPrefix20210330\Nette\Utils\Strings;
final class VersionConditionMatcher implements \Ssch\TYPO3Rector\TypoScript\Conditions\TyposcriptConditionMatcher
{
    /**
     * @var string
     */
    private const TYPE = 'version';
    public function change(string $condition) : ?string
    {
        return null;
    }
    public function shouldApply(string $condition) : bool
    {
        return \Typo3RectorPrefix20210330\Nette\Utils\Strings::startsWith($condition, self::TYPE);
    }
}
