<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210318\Symfony\Component\Console\Descriptor;

use Typo3RectorPrefix20210318\Symfony\Component\Console\Application;
use Typo3RectorPrefix20210318\Symfony\Component\Console\Command\Command;
use Typo3RectorPrefix20210318\Symfony\Component\Console\Exception\InvalidArgumentException;
use Typo3RectorPrefix20210318\Symfony\Component\Console\Input\InputArgument;
use Typo3RectorPrefix20210318\Symfony\Component\Console\Input\InputDefinition;
use Typo3RectorPrefix20210318\Symfony\Component\Console\Input\InputOption;
use Typo3RectorPrefix20210318\Symfony\Component\Console\Output\OutputInterface;
/**
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
abstract class Descriptor implements \Typo3RectorPrefix20210318\Symfony\Component\Console\Descriptor\DescriptorInterface
{
    /**
     * @var OutputInterface
     */
    protected $output;
    /**
     * {@inheritdoc}
     */
    public function describe(\Typo3RectorPrefix20210318\Symfony\Component\Console\Output\OutputInterface $output, $object, array $options = [])
    {
        $this->output = $output;
        switch (\true) {
            case $object instanceof \Typo3RectorPrefix20210318\Symfony\Component\Console\Input\InputArgument:
                $this->describeInputArgument($object, $options);
                break;
            case $object instanceof \Typo3RectorPrefix20210318\Symfony\Component\Console\Input\InputOption:
                $this->describeInputOption($object, $options);
                break;
            case $object instanceof \Typo3RectorPrefix20210318\Symfony\Component\Console\Input\InputDefinition:
                $this->describeInputDefinition($object, $options);
                break;
            case $object instanceof \Typo3RectorPrefix20210318\Symfony\Component\Console\Command\Command:
                $this->describeCommand($object, $options);
                break;
            case $object instanceof \Typo3RectorPrefix20210318\Symfony\Component\Console\Application:
                $this->describeApplication($object, $options);
                break;
            default:
                throw new \Typo3RectorPrefix20210318\Symfony\Component\Console\Exception\InvalidArgumentException(\sprintf('Object of type "%s" is not describable.', \get_debug_type($object)));
        }
    }
    /**
     * Writes content to output.
     */
    protected function write(string $content, bool $decorated = \false)
    {
        $this->output->write($content, \false, $decorated ? \Typo3RectorPrefix20210318\Symfony\Component\Console\Output\OutputInterface::OUTPUT_NORMAL : \Typo3RectorPrefix20210318\Symfony\Component\Console\Output\OutputInterface::OUTPUT_RAW);
    }
    /**
     * Describes an InputArgument instance.
     *
     * @return string|mixed
     */
    protected abstract function describeInputArgument(\Typo3RectorPrefix20210318\Symfony\Component\Console\Input\InputArgument $argument, array $options = []);
    /**
     * Describes an InputOption instance.
     *
     * @return string|mixed
     */
    protected abstract function describeInputOption(\Typo3RectorPrefix20210318\Symfony\Component\Console\Input\InputOption $option, array $options = []);
    /**
     * Describes an InputDefinition instance.
     *
     * @return string|mixed
     */
    protected abstract function describeInputDefinition(\Typo3RectorPrefix20210318\Symfony\Component\Console\Input\InputDefinition $definition, array $options = []);
    /**
     * Describes a Command instance.
     *
     * @return string|mixed
     */
    protected abstract function describeCommand(\Typo3RectorPrefix20210318\Symfony\Component\Console\Command\Command $command, array $options = []);
    /**
     * Describes an Application instance.
     *
     * @return string|mixed
     */
    protected abstract function describeApplication(\Typo3RectorPrefix20210318\Symfony\Component\Console\Application $application, array $options = []);
}
