<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\TypoScript\Parser\Printer;

use Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\Comment;
use Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\ConditionalStatement;
use Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\DirectoryIncludeStatement;
use Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\FileIncludeStatement;
use Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\IncludeStatement;
use Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\MultilineComment;
use Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\NestedAssignment;
use Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment;
use Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\Operator\BinaryObjectOperator;
use Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\Operator\Copy;
use Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\Operator\Delete;
use Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\Operator\Modification;
use Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\Operator\Reference;
use Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\Statement;
use Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\Printer\ASTPrinterInterface;
use Typo3RectorPrefix20210415\Symfony\Component\Console\Output\OutputInterface;
/**
 * Fixes the error https://github.com/martin-helmich/typo3-typoscript-parser/issues/52
 */
final class PrettyPrinter implements \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\Printer\ASTPrinterInterface
{
    /**
     * @param Statement[]     $statements
     */
    public function printStatements(array $statements, \Typo3RectorPrefix20210415\Symfony\Component\Console\Output\OutputInterface $output) : void
    {
        $this->printStatementList($statements, $output);
    }
    /**
     * @param Statement[]     $statements
     */
    private function printStatementList(array $statements, \Typo3RectorPrefix20210415\Symfony\Component\Console\Output\OutputInterface $output, int $nesting = 0) : void
    {
        $indent = $this->getIndent($nesting);
        $count = \count($statements);
        for ($i = 0; $i < $count; ++$i) {
            $statement = $statements[$i];
            if ($statement instanceof \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\NestedAssignment) {
                $this->printNestedAssignment($output, $nesting, $statement);
            } elseif ($statement instanceof \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment) {
                $this->printAssignment($output, $statement, $indent);
            } elseif ($statement instanceof \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\Operator\BinaryObjectOperator) {
                $this->printBinaryObjectOperator($output, $statement, $nesting);
            } elseif ($statement instanceof \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\Operator\Delete) {
                $output->writeln($indent . $statement->object->relativeName . ' >');
            } elseif ($statement instanceof \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\Operator\Modification) {
                $output->writeln(\sprintf('%s%s := %s(%s)', $indent, $statement->object->relativeName, $statement->call->method, $statement->call->arguments));
            } elseif ($statement instanceof \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\ConditionalStatement) {
                $this->printConditionalStatement($output, $nesting, $statement);
            } elseif ($statement instanceof \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\IncludeStatement) {
                $this->printIncludeStatement($output, $statement);
            } elseif ($statement instanceof \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\Comment) {
                $output->writeln($indent . $statement->comment);
            } elseif ($statement instanceof \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\MultilineComment) {
                $output->writeln($indent . $statement->comment);
            }
        }
    }
    private function getIndent(int $nesting) : string
    {
        return \str_repeat('    ', $nesting);
    }
    private function printBinaryObjectOperator(\Typo3RectorPrefix20210415\Symfony\Component\Console\Output\OutputInterface $output, \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\Operator\BinaryObjectOperator $operator, int $nesting) : void
    {
        $targetObjectPath = $operator->target->relativeName;
        if ($operator instanceof \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\Operator\Copy) {
            $output->writeln($this->getIndent($nesting) . $operator->object->relativeName . ' < ' . $targetObjectPath);
        } elseif ($operator instanceof \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\Operator\Reference) {
            $output->writeln($this->getIndent($nesting) . $operator->object->relativeName . ' =< ' . $targetObjectPath);
        }
    }
    private function printIncludeStatement(\Typo3RectorPrefix20210415\Symfony\Component\Console\Output\OutputInterface $output, \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\IncludeStatement $statement) : void
    {
        if ($statement instanceof \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\FileIncludeStatement) {
            $this->printFileIncludeStatement($output, $statement);
        } elseif ($statement instanceof \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\DirectoryIncludeStatement) {
            $this->printDirectoryIncludeStatement($output, $statement);
        }
    }
    private function printFileIncludeStatement(\Typo3RectorPrefix20210415\Symfony\Component\Console\Output\OutputInterface $output, \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\FileIncludeStatement $statement) : void
    {
        if ($statement->newSyntax) {
            $output->writeln("@import '" . $statement->filename . "'");
        } else {
            $attributes = '';
            if ($statement->condition) {
                $attributes = ' condition="' . $statement->condition . '"';
            }
            $output->writeln('<INCLUDE_TYPOSCRIPT: source="FILE:' . $statement->filename . '"' . $attributes . '>');
        }
    }
    private function printDirectoryIncludeStatement(\Typo3RectorPrefix20210415\Symfony\Component\Console\Output\OutputInterface $output, \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\DirectoryIncludeStatement $statement) : void
    {
        $attributes = '';
        if ($statement->extensions) {
            $attributes .= ' extensions="' . $statement->extensions . '"';
        }
        if ($statement->condition) {
            $attributes .= ' condition="' . $statement->condition . '"';
        }
        $includeStmt = '<INCLUDE_TYPOSCRIPT: source="DIR:' . $statement->directory . '"' . $attributes . '>';
        $output->writeln($includeStmt);
    }
    /**
     * @param int              $nesting
     */
    private function printNestedAssignment(\Typo3RectorPrefix20210415\Symfony\Component\Console\Output\OutputInterface $output, $nesting, \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\NestedAssignment $statement) : void
    {
        $output->writeln($this->getIndent($nesting) . $statement->object->relativeName . ' {');
        $this->printStatementList($statement->statements, $output, $nesting + 1);
        $output->writeln($this->getIndent($nesting) . '}');
    }
    private function printConditionalStatement(\Typo3RectorPrefix20210415\Symfony\Component\Console\Output\OutputInterface $output, int $nesting, \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\ConditionalStatement $statement) : void
    {
        $output->writeln($statement->condition);
        $this->printStatementList($statement->ifStatements, $output, $nesting);
        if (\count($statement->elseStatements) > 0) {
            $output->writeln('[else]');
            $this->printStatementList($statement->elseStatements, $output, $nesting);
        }
        $output->writeln('[global]');
    }
    private function printAssignment(\Typo3RectorPrefix20210415\Symfony\Component\Console\Output\OutputInterface $output, \Typo3RectorPrefix20210415\Helmich\TypoScriptParser\Parser\AST\Operator\Assignment $statement, string $indent) : void
    {
        if (\false !== \strpos($statement->value->value, "\n")) {
            $output->writeln($indent . $statement->object->relativeName . ' (');
            $output->writeln(\rtrim($statement->value->value));
            $output->writeln($indent . ')');
            return;
        }
        $output->writeln($indent . $statement->object->relativeName . ' = ' . $statement->value->value);
    }
}
