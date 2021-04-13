<?php

namespace Typo3RectorPrefix20210413\Psr\Log;

/**
 * Describes a logger-aware instance.
 */
interface LoggerAwareInterface
{
    /**
     * Sets a logger instance on the object.
     *
     * @param LoggerInterface $logger
     *
     * @return void
     */
    public function setLogger(\Typo3RectorPrefix20210413\Psr\Log\LoggerInterface $logger);
}
