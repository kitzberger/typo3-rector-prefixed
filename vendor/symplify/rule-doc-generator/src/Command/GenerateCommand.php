<?php

declare (strict_types=1);
namespace Symplify\RuleDocGenerator\Command;

use Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputArgument;
use Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputInterface;
use Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputOption;
use Typo3RectorPrefix20210321\Symfony\Component\Console\Output\OutputInterface;
use Typo3RectorPrefix20210321\Symplify\PackageBuilder\Console\Command\AbstractSymplifyCommand;
use Typo3RectorPrefix20210321\Symplify\PackageBuilder\Console\ShellCode;
use Symplify\RuleDocGenerator\DirectoryToMarkdownPrinter;
use Symplify\RuleDocGenerator\ValueObject\Option;
use Typo3RectorPrefix20210321\Symplify\SmartFileSystem\SmartFileInfo;
final class GenerateCommand extends \Typo3RectorPrefix20210321\Symplify\PackageBuilder\Console\Command\AbstractSymplifyCommand
{
    /**
     * @var DirectoryToMarkdownPrinter
     */
    private $directoryToMarkdownPrinter;
    public function __construct(\Symplify\RuleDocGenerator\DirectoryToMarkdownPrinter $directoryToMarkdownPrinter)
    {
        parent::__construct();
        $this->directoryToMarkdownPrinter = $directoryToMarkdownPrinter;
    }
    protected function configure() : void
    {
        $this->setDescription('Generated Markdown documentation based on documented rules found in directory');
        $this->addArgument(\Symplify\RuleDocGenerator\ValueObject\Option::PATHS, \Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputArgument::REQUIRED | \Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputArgument::IS_ARRAY, 'Path to directory of your project');
        $this->addOption(\Symplify\RuleDocGenerator\ValueObject\Option::OUTPUT_FILE, null, \Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputOption::VALUE_REQUIRED, 'Path to output generated markdown file', \getcwd() . '/docs/rules_overview.md');
        $this->addOption(\Symplify\RuleDocGenerator\ValueObject\Option::CATEGORIZE, null, \Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'Group in categories');
    }
    protected function execute(\Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputInterface $input, \Typo3RectorPrefix20210321\Symfony\Component\Console\Output\OutputInterface $output) : int
    {
        $paths = (array) $input->getArgument(\Symplify\RuleDocGenerator\ValueObject\Option::PATHS);
        $shouldCategorize = (bool) $input->getOption(\Symplify\RuleDocGenerator\ValueObject\Option::CATEGORIZE);
        // dump markdown file
        $outputFilePath = (string) $input->getOption(\Symplify\RuleDocGenerator\ValueObject\Option::OUTPUT_FILE);
        $markdownFileDirectory = \dirname($outputFilePath);
        $markdownFileContent = $this->directoryToMarkdownPrinter->print($markdownFileDirectory, $paths, $shouldCategorize);
        $this->smartFileSystem->dumpFile($outputFilePath, $markdownFileContent);
        $outputFileInfo = new \Typo3RectorPrefix20210321\Symplify\SmartFileSystem\SmartFileInfo($outputFilePath);
        $message = \sprintf('File "%s" was created', $outputFileInfo->getRelativeFilePathFromCwd());
        $this->symfonyStyle->success($message);
        return \Typo3RectorPrefix20210321\Symplify\PackageBuilder\Console\ShellCode::SUCCESS;
    }
}
