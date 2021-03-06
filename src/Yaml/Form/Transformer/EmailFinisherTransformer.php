<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Yaml\Form\Transformer;

use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
/**
 * @changelog https://docs.typo3.org/c/typo3/cms-core/10.2/en-us/Changelog/10.0/Feature-80420-AllowMultipleRecipientsInEmailFinisher.html
 */
final class EmailFinisherTransformer implements \Ssch\TYPO3Rector\Yaml\Form\Transformer\FormYamlTransformer
{
    /**
     * @var string
     */
    private const FINISHERS = 'finishers';
    /**
     * @var string
     */
    private const OPTIONS = 'options';
    /**
     * @var string
     */
    private const RECIPIENT_ADDRESS = 'recipientAddress';
    /**
     * @var string
     */
    private const RECIPIENTS = 'recipients';
    public function transform(array $yaml) : array
    {
        if (!\array_key_exists(self::FINISHERS, $yaml)) {
            return $yaml;
        }
        foreach ($yaml[self::FINISHERS] as $finisherKey => $finisher) {
            if (!\array_key_exists('identifier', $finisher)) {
                continue;
            }
            if (!\in_array($finisher['identifier'], ['EmailToSender', 'EmailToReceiver'], \true)) {
                continue;
            }
            if (!\array_key_exists(self::OPTIONS, $finisher)) {
                continue;
            }
            $recipients = [];
            foreach ((array) $finisher[self::OPTIONS] as $optionKey => $optionValue) {
                if (!\in_array($optionKey, ['replyToAddress', 'carbonCopyAddress', 'blindCarbonCopyAddress', self::RECIPIENT_ADDRESS, 'recipientName'], \true)) {
                    continue;
                }
                if ('replyToAddress' === $optionKey) {
                    $yaml[self::FINISHERS][$finisherKey][self::OPTIONS]['replyToRecipients'][] = $optionValue;
                } elseif ('carbonCopyAddress' === $optionKey) {
                    $yaml[self::FINISHERS][$finisherKey][self::OPTIONS]['carbonCopyRecipients'][] = $optionValue;
                } elseif ('blindCarbonCopyAddress' === $optionKey) {
                    $yaml[self::FINISHERS][$finisherKey][self::OPTIONS]['blindCarbonCopyRecipients'][] = $optionValue;
                }
                unset($yaml[self::FINISHERS][$finisherKey][self::OPTIONS][$optionKey]);
            }
            if (isset($finisher[self::OPTIONS][self::RECIPIENT_ADDRESS])) {
                $recipients[$finisher[self::OPTIONS][self::RECIPIENT_ADDRESS]] = $finisher[self::OPTIONS]['recipientName'] ?: '';
            }
            if (isset($finisher[self::OPTIONS][self::RECIPIENTS])) {
                $yaml[self::FINISHERS][$finisherKey][self::OPTIONS][self::RECIPIENTS] = \array_merge($recipients, $yaml[self::FINISHERS][$finisherKey][self::OPTIONS][self::RECIPIENTS]);
            } else {
                $yaml[self::FINISHERS][$finisherKey][self::OPTIONS][self::RECIPIENTS] = $recipients;
            }
        }
        return $yaml;
    }
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Convert single recipient values to array for EmailFinisher', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
finishers:
  -
    options:
      recipientAddress: bar@domain.com
      recipientName: 'Bar'
CODE_SAMPLE
, <<<'CODE_SAMPLE'
finishers:
  -
    options:
      recipients:
        bar@domain.com: 'Bar'
CODE_SAMPLE
)]);
    }
}
