<?php

namespace Typo3RectorPrefix20210411\Stringy;

if (!\function_exists('Typo3RectorPrefix20210411\\Stringy\\create')) {
    /**
     * Creates a Stringy object and returns it on success.
     *
     * @param  mixed   $str      Value to modify, after being cast to string
     * @param  string  $encoding The character encoding
     * @return Stringy A Stringy object
     * @throws \InvalidArgumentException if an array or object without a
     *         __toString method is passed as the first argument
     */
    function create($str, $encoding = null)
    {
        return new \Typo3RectorPrefix20210411\Stringy\Stringy($str, $encoding);
    }
}
