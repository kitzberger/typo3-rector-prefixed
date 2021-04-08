<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\TypoScript\Conditions;

use Typo3RectorPrefix20210408\Nette\Utils\Strings;
use Ssch\TYPO3Rector\ArrayUtility;
final class GlobalStringConditionMatcher implements \Ssch\TYPO3Rector\TypoScript\Conditions\TyposcriptConditionMatcher
{
    /**
     * @var string
     */
    private const TYPE = 'globalString';
    /**
     * @var array
     */
    private const IENV_MAPPING = ['HTTP_HOST' => 'getHttpHost'];
    public function change(string $condition) : ?string
    {
        \preg_match('#' . self::TYPE . self::ZERO_ONE_OR_MORE_WHITESPACES . '=' . self::ZERO_ONE_OR_MORE_WHITESPACES . '(?<subCondition>.*)#', $condition, $subConditions);
        if (!\is_string($subConditions['subCondition'])) {
            return $condition;
        }
        $subConditions = \Ssch\TYPO3Rector\ArrayUtility::trimExplode(',', $subConditions['subCondition']);
        $newConditions = [];
        foreach ($subConditions as $subCondition) {
            \preg_match('#(?<type>ENV|IENV):(?<property>.*) ' . self::ZERO_ONE_OR_MORE_WHITESPACES . '(?<operator>' . self::ALLOWED_OPERATORS_REGEX . ')' . self::ZERO_ONE_OR_MORE_WHITESPACES . '(?<value>.*)$#Ui', $subCondition, $matches);
            $type = \trim($matches['type']);
            $property = \trim($matches['property']);
            $operator = \trim($matches['operator']);
            $value = \trim($matches['value']);
            if ('ENV' === $type) {
                $newConditions[] = $this->createEnvCondition($property, $operator, $value);
            } elseif ('IENV' === $type) {
                $newConditions[] = $this->createIndependentCondition($property, $operator, $value);
            }
        }
        return \implode(' || ', $newConditions);
    }
    public function shouldApply(string $condition) : bool
    {
        return \Typo3RectorPrefix20210408\Nette\Utils\Strings::startsWith($condition, self::TYPE);
    }
    private function createEnvCondition(string $property, string $operator, string $value) : string
    {
        return \sprintf('getenv("%s") %s "%s"', $property, self::OPERATOR_MAPPING[$operator], $value);
    }
    private function createIndependentCondition(string $property, string $operator, string $value) : string
    {
        if (\Typo3RectorPrefix20210408\Nette\Utils\Strings::contains($value, '*')) {
            return \sprintf('like(request.getNormalizedParams().%s(), "%s")', self::IENV_MAPPING[$property], $value);
        }
        return \sprintf('request.getNormalizedParams().%s() %s "%s"', self::IENV_MAPPING[$property], self::OPERATOR_MAPPING[$operator], $value);
    }
}
