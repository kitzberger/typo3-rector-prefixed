<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210421\Symfony\Component\VarDumper\Caster;

use Typo3RectorPrefix20210421\Ramsey\Uuid\UuidInterface;
use Typo3RectorPrefix20210421\Symfony\Component\VarDumper\Cloner\Stub;
/**
 * @author Grégoire Pineau <lyrixx@lyrixx.info>
 */
final class UuidCaster
{
    public static function castRamseyUuid(\Typo3RectorPrefix20210421\Ramsey\Uuid\UuidInterface $c, array $a, \Typo3RectorPrefix20210421\Symfony\Component\VarDumper\Cloner\Stub $stub, bool $isNested) : array
    {
        $a += [\Typo3RectorPrefix20210421\Symfony\Component\VarDumper\Caster\Caster::PREFIX_VIRTUAL . 'uuid' => (string) $c];
        return $a;
    }
}
