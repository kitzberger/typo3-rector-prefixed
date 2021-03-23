<?php

declare (strict_types=1);
namespace Rector\Core\Console\Command;

use Rector\RectorGenerator\TemplateInitializer;
use Typo3RectorPrefix20210323\Symfony\Component\Console\Input\InputInterface;
use Typo3RectorPrefix20210323\Symfony\Component\Console\Output\OutputInterface;
use Typo3RectorPrefix20210323\Symplify\PackageBuilder\Console\ShellCode;
final class InitCommand extends \Rector\Core\Console\Command\AbstractCommand
{
    /**
     * @var TemplateInitializer
     */
    private $templateInitializer;
    public function __construct(\Rector\RectorGenerator\TemplateInitializer $templateInitializer)
    {
        parent::__construct();
        $this->templateInitializer = $templateInitializer;
    }
    protected function configure() : void
    {
        $this->setDescription('Generate rector.php configuration file');
    }
    protected function execute(\Typo3RectorPrefix20210323\Symfony\Component\Console\Input\InputInterface $input, \Typo3RectorPrefix20210323\Symfony\Component\Console\Output\OutputInterface $output) : int
    {
        $this->templateInitializer->initialize(__DIR__ . '/../../../templates/rector.php.dist', 'rector.php');
        return \Typo3RectorPrefix20210323\Symplify\PackageBuilder\Console\ShellCode::SUCCESS;
    }
}
