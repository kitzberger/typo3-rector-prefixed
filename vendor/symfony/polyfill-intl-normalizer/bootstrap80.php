<?php

namespace Typo3RectorPrefix20210321;

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
use Typo3RectorPrefix20210321\Symfony\Polyfill\Intl\Normalizer as p;
if (!\function_exists('normalizer_is_normalized')) {
    function normalizer_is_normalized(?string $string, ?int $form = \Typo3RectorPrefix20210321\Symfony\Polyfill\Intl\Normalizer\Normalizer::FORM_C) : bool
    {
        return \Typo3RectorPrefix20210321\Symfony\Polyfill\Intl\Normalizer\Normalizer::isNormalized((string) $string, (int) $form);
    }
}
if (!\function_exists('normalizer_normalize')) {
    function normalizer_normalize(?string $string, ?int $form = \Typo3RectorPrefix20210321\Symfony\Polyfill\Intl\Normalizer\Normalizer::FORM_C) : string|false
    {
        return \Typo3RectorPrefix20210321\Symfony\Polyfill\Intl\Normalizer\Normalizer::normalize((string) $string, (int) $form);
    }
}
