<?php

declare (strict_types=1);
namespace Rector\RectorGenerator\Command;

use Rector\RectorGenerator\TemplateInitializer;
use Typo3RectorPrefix20210223\Symfony\Component\Console\Command\Command;
use Typo3RectorPrefix20210223\Symfony\Component\Console\Input\InputInterface;
use Typo3RectorPrefix20210223\Symfony\Component\Console\Output\OutputInterface;
use Typo3RectorPrefix20210223\Symplify\PackageBuilder\Console\ShellCode;
final class InitRecipeCommand extends \Typo3RectorPrefix20210223\Symfony\Component\Console\Command\Command
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
        $this->setDescription('[DEV] Initialize "rector-recipe.php" config');
    }
    protected function execute(\Typo3RectorPrefix20210223\Symfony\Component\Console\Input\InputInterface $input, \Typo3RectorPrefix20210223\Symfony\Component\Console\Output\OutputInterface $output) : int
    {
        $this->templateInitializer->initialize(__DIR__ . '/../../../../templates/rector-recipe.php.dist', 'rector-recipe.php');
        return \Typo3RectorPrefix20210223\Symplify\PackageBuilder\Console\ShellCode::SUCCESS;
    }
}
