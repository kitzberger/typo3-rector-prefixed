<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210410\Symfony\Component\VarDumper\Command;

use Typo3RectorPrefix20210410\Symfony\Component\Console\Command\Command;
use Typo3RectorPrefix20210410\Symfony\Component\Console\Exception\InvalidArgumentException;
use Typo3RectorPrefix20210410\Symfony\Component\Console\Input\InputInterface;
use Typo3RectorPrefix20210410\Symfony\Component\Console\Input\InputOption;
use Typo3RectorPrefix20210410\Symfony\Component\Console\Output\OutputInterface;
use Typo3RectorPrefix20210410\Symfony\Component\Console\Style\SymfonyStyle;
use Typo3RectorPrefix20210410\Symfony\Component\VarDumper\Cloner\Data;
use Typo3RectorPrefix20210410\Symfony\Component\VarDumper\Command\Descriptor\CliDescriptor;
use Typo3RectorPrefix20210410\Symfony\Component\VarDumper\Command\Descriptor\DumpDescriptorInterface;
use Typo3RectorPrefix20210410\Symfony\Component\VarDumper\Command\Descriptor\HtmlDescriptor;
use Typo3RectorPrefix20210410\Symfony\Component\VarDumper\Dumper\CliDumper;
use Typo3RectorPrefix20210410\Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Typo3RectorPrefix20210410\Symfony\Component\VarDumper\Server\DumpServer;
/**
 * Starts a dump server to collect and output dumps on a single place with multiple formats support.
 *
 * @author Maxime Steinhausser <maxime.steinhausser@gmail.com>
 *
 * @final
 */
class ServerDumpCommand extends \Typo3RectorPrefix20210410\Symfony\Component\Console\Command\Command
{
    protected static $defaultName = 'server:dump';
    private $server;
    /** @var DumpDescriptorInterface[] */
    private $descriptors;
    public function __construct(\Typo3RectorPrefix20210410\Symfony\Component\VarDumper\Server\DumpServer $server, array $descriptors = [])
    {
        $this->server = $server;
        $this->descriptors = $descriptors + ['cli' => new \Typo3RectorPrefix20210410\Symfony\Component\VarDumper\Command\Descriptor\CliDescriptor(new \Typo3RectorPrefix20210410\Symfony\Component\VarDumper\Dumper\CliDumper()), 'html' => new \Typo3RectorPrefix20210410\Symfony\Component\VarDumper\Command\Descriptor\HtmlDescriptor(new \Typo3RectorPrefix20210410\Symfony\Component\VarDumper\Dumper\HtmlDumper())];
        parent::__construct();
    }
    protected function configure()
    {
        $availableFormats = \implode(', ', \array_keys($this->descriptors));
        $this->addOption('format', null, \Typo3RectorPrefix20210410\Symfony\Component\Console\Input\InputOption::VALUE_REQUIRED, \sprintf('The output format (%s)', $availableFormats), 'cli')->setDescription('Start a dump server that collects and displays dumps in a single place')->setHelp(<<<'EOF'
<info>%command.name%</info> starts a dump server that collects and displays
dumps in a single place for debugging you application:

  <info>php %command.full_name%</info>

You can consult dumped data in HTML format in your browser by providing the <comment>--format=html</comment> option
and redirecting the output to a file:

  <info>php %command.full_name% --format="html" > dump.html</info>

EOF
);
    }
    protected function execute(\Typo3RectorPrefix20210410\Symfony\Component\Console\Input\InputInterface $input, \Typo3RectorPrefix20210410\Symfony\Component\Console\Output\OutputInterface $output) : int
    {
        $io = new \Typo3RectorPrefix20210410\Symfony\Component\Console\Style\SymfonyStyle($input, $output);
        $format = $input->getOption('format');
        if (!($descriptor = $this->descriptors[$format] ?? null)) {
            throw new \Typo3RectorPrefix20210410\Symfony\Component\Console\Exception\InvalidArgumentException(\sprintf('Unsupported format "%s".', $format));
        }
        $errorIo = $io->getErrorStyle();
        $errorIo->title('Symfony Var Dumper Server');
        $this->server->start();
        $errorIo->success(\sprintf('Server listening on %s', $this->server->getHost()));
        $errorIo->comment('Quit the server with CONTROL-C.');
        $this->server->listen(function (\Typo3RectorPrefix20210410\Symfony\Component\VarDumper\Cloner\Data $data, array $context, int $clientId) use($descriptor, $io) {
            $descriptor->describe($io, $data, $context, $clientId);
        });
    }
}
