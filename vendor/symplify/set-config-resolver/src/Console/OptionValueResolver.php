<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210316\Symplify\SetConfigResolver\Console;

use Typo3RectorPrefix20210316\Symfony\Component\Console\Input\InputInterface;
final class OptionValueResolver
{
    /**
     * @param string[] $optionNames
     */
    public function getOptionValue(\Typo3RectorPrefix20210316\Symfony\Component\Console\Input\InputInterface $input, array $optionNames) : ?string
    {
        foreach ($optionNames as $optionName) {
            if ($input->hasParameterOption($optionName, \true)) {
                return $input->getParameterOption($optionName, null, \true);
            }
        }
        return null;
    }
}
