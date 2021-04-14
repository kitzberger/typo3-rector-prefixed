<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210414\Helmich\TypoScriptParser\Parser\Printer;

use Typo3RectorPrefix20210414\Symfony\Component\Console\Output\OutputInterface;
interface ASTPrinterInterface
{
    /**
     * @param \Helmich\TypoScriptParser\Parser\AST\Statement[]  $statements
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return void
     */
    public function printStatements(array $statements, \Typo3RectorPrefix20210414\Symfony\Component\Console\Output\OutputInterface $output) : void;
}
