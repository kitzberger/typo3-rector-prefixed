<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210317\Symfony\Component\VarDumper\Command\Descriptor;

use Typo3RectorPrefix20210317\Symfony\Component\Console\Output\OutputInterface;
use Typo3RectorPrefix20210317\Symfony\Component\VarDumper\Cloner\Data;
/**
 * @author Maxime Steinhausser <maxime.steinhausser@gmail.com>
 */
interface DumpDescriptorInterface
{
    public function describe(\Typo3RectorPrefix20210317\Symfony\Component\Console\Output\OutputInterface $output, \Typo3RectorPrefix20210317\Symfony\Component\VarDumper\Cloner\Data $data, array $context, int $clientId) : void;
}
