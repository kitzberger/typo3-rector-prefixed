<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210324\Symfony\Component\VarDumper\Caster;

use Typo3RectorPrefix20210324\Symfony\Component\VarDumper\Cloner\Stub;
/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class DsPairStub extends \Typo3RectorPrefix20210324\Symfony\Component\VarDumper\Cloner\Stub
{
    public function __construct($key, $value)
    {
        $this->value = [\Typo3RectorPrefix20210324\Symfony\Component\VarDumper\Caster\Caster::PREFIX_VIRTUAL . 'key' => $key, \Typo3RectorPrefix20210324\Symfony\Component\VarDumper\Caster\Caster::PREFIX_VIRTUAL . 'value' => $value];
    }
}
