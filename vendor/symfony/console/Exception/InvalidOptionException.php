<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210223\Symfony\Component\Console\Exception;

/**
 * Represents an incorrect option name typed in the console.
 *
 * @author Jérôme Tamarelle <jerome@tamarelle.net>
 */
class InvalidOptionException extends \InvalidArgumentException implements \Typo3RectorPrefix20210223\Symfony\Component\Console\Exception\ExceptionInterface
{
}