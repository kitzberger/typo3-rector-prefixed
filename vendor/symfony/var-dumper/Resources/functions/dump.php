<?php

namespace Typo3RectorPrefix20210308;

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
use Typo3RectorPrefix20210308\Symfony\Component\VarDumper\VarDumper;
if (!\function_exists('Typo3RectorPrefix20210308\\dump')) {
    /**
     * @author Nicolas Grekas <p@tchwork.com>
     */
    function dump($var, ...$moreVars)
    {
        \Typo3RectorPrefix20210308\Symfony\Component\VarDumper\VarDumper::dump($var);
        foreach ($moreVars as $v) {
            \Typo3RectorPrefix20210308\Symfony\Component\VarDumper\VarDumper::dump($v);
        }
        if (1 < \func_num_args()) {
            return \func_get_args();
        }
        return $var;
    }
}
if (!\function_exists('Typo3RectorPrefix20210308\\dd')) {
    function dd(...$vars)
    {
        foreach ($vars as $v) {
            \Typo3RectorPrefix20210308\Symfony\Component\VarDumper\VarDumper::dump($v);
        }
        exit(1);
    }
}
