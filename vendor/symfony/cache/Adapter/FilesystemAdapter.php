<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210302\Symfony\Component\Cache\Adapter;

use Typo3RectorPrefix20210302\Symfony\Component\Cache\Marshaller\DefaultMarshaller;
use Typo3RectorPrefix20210302\Symfony\Component\Cache\Marshaller\MarshallerInterface;
use Typo3RectorPrefix20210302\Symfony\Component\Cache\PruneableInterface;
use Typo3RectorPrefix20210302\Symfony\Component\Cache\Traits\FilesystemTrait;
class FilesystemAdapter extends \Typo3RectorPrefix20210302\Symfony\Component\Cache\Adapter\AbstractAdapter implements \Typo3RectorPrefix20210302\Symfony\Component\Cache\PruneableInterface
{
    use FilesystemTrait;
    public function __construct(string $namespace = '', int $defaultLifetime = 0, string $directory = null, \Typo3RectorPrefix20210302\Symfony\Component\Cache\Marshaller\MarshallerInterface $marshaller = null)
    {
        $this->marshaller = $marshaller ?? new \Typo3RectorPrefix20210302\Symfony\Component\Cache\Marshaller\DefaultMarshaller();
        parent::__construct('', $defaultLifetime);
        $this->init($namespace, $directory);
    }
}
