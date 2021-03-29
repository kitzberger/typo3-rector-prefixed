<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\ServiceOptionAnalyzer;

use Typo3RectorPrefix20210329\Nette\Utils\Strings;
final class ServiceOptionAnalyzer
{
    public function hasNamedArguments(array $data) : bool
    {
        if ($data === []) {
            return \false;
        }
        foreach (\array_keys($data) as $key) {
            if (!\Typo3RectorPrefix20210329\Nette\Utils\Strings::startsWith((string) $key, '$')) {
                return \false;
            }
        }
        return \true;
    }
}
