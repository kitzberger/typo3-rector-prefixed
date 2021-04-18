<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST;

/**
 * Class RootObjectPath
 *
 * @package    Helmich\TypoScriptParser
 * @subpackage Parser\AST
 */
class RootObjectPath extends \Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\ObjectPath
{
    /**
     * RootObjectPath constructor.
     */
    public function __construct()
    {
        parent::__construct('', '');
    }
    /**
     * @return ObjectPath
     */
    public function parent() : \Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\ObjectPath
    {
        return $this;
    }
    /**
     * @return int
     */
    public function depth() : int
    {
        return 0;
    }
    /**
     * @param string $name
     * @return ObjectPath
     */
    public function append($name) : \Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\ObjectPath
    {
        return new \Typo3RectorPrefix20210418\Helmich\TypoScriptParser\Parser\AST\ObjectPath(\ltrim($name, '.'), $name);
    }
}
