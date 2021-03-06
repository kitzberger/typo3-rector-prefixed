<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210423\Symfony\Component\Uid;

/**
 * @experimental in 5.2
 *
 * @author Grégoire Pineau <lyrixx@lyrixx.info>
 */
class NilUuid extends \Typo3RectorPrefix20210423\Symfony\Component\Uid\Uuid
{
    protected const TYPE = -1;
    public function __construct()
    {
        $this->uid = '00000000-0000-0000-0000-000000000000';
    }
}
