<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST;

/**
 * Helper class for quickly building AST nodes
 *
 * @package    Helmich\TypoScriptParser
 * @subpackage Parser\AST
 */
class Builder
{
    /** @var Operator\Builder */
    private $operatorBuilder;
    /**
     * Builder constructor.
     */
    public function __construct()
    {
        $this->operatorBuilder = new \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\Operator\Builder();
    }
    /**
     * @param string      $condition
     * @param Statement[] $if
     * @param Statement[] $else
     * @param int         $line
     * @return ConditionalStatement
     */
    public function condition(string $condition, array $if, array $else, int $line) : \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\ConditionalStatement
    {
        return new \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\ConditionalStatement($condition, $if, $else, $line);
    }
    public function comment(string $comment, int $line) : \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\Comment
    {
        return new \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\Comment($comment, $line);
    }
    public function multilineComment(string $comment, int $line) : \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\MultilineComment
    {
        return new \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\MultilineComment($comment, $line);
    }
    /**
     * @param string      $directory
     * @param string|null $extensions
     * @param string|null $condition
     * @param int         $line
     * @return DirectoryIncludeStatement
     */
    public function includeDirectory(string $directory, ?string $extensions, ?string $condition, int $line) : \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\DirectoryIncludeStatement
    {
        return new \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\DirectoryIncludeStatement($directory, $extensions, $condition, $line);
    }
    /**
     * @param string      $file
     * @param boolean     $newSyntax
     * @param string|null $condition
     * @param int         $line
     * @return FileIncludeStatement
     */
    public function includeFile(string $file, bool $newSyntax, ?string $condition, int $line) : \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\FileIncludeStatement
    {
        return new \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\FileIncludeStatement($file, $newSyntax, $condition, $line);
    }
    /**
     * @param ObjectPath  $path
     * @param Statement[] $statements
     * @param int         $line
     * @return NestedAssignment
     */
    public function nested(\Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\ObjectPath $path, array $statements, int $line) : \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\NestedAssignment
    {
        return new \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\NestedAssignment($path, $statements, $line);
    }
    /**
     * @param string $value
     * @return Scalar
     */
    public function scalar(string $value) : \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\Scalar
    {
        return new \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\Scalar($value);
    }
    /**
     * @param string $absolute
     * @param string $relative
     * @return ObjectPath
     */
    public function path(string $absolute, string $relative) : \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\ObjectPath
    {
        return new \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\ObjectPath($absolute, $relative);
    }
    /**
     * @return Operator\Builder
     */
    public function op() : \Typo3RectorPrefix20210421\Helmich\TypoScriptParser\Parser\AST\Operator\Builder
    {
        return $this->operatorBuilder;
    }
}
