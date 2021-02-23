<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Helper\Database\Refactorings;

use PhpParser\Node\Arg;
use PhpParser\Node\Expr\Assign;
use PhpParser\Node\Expr\Variable;
use Rector\Core\PhpParser\Node\NodeFactory;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
final class ConnectionCallFactory
{
    /**
     * @var NodeFactory
     */
    private $nodeFactory;
    public function __construct(\Rector\Core\PhpParser\Node\NodeFactory $nodeFactory)
    {
        $this->nodeFactory = $nodeFactory;
    }
    public function createConnectionCall(\PhpParser\Node\Arg $firstArgument) : \PhpParser\Node\Expr\Assign
    {
        $connection = $this->nodeFactory->createMethodCall($this->nodeFactory->createStaticCall(\TYPO3\CMS\Core\Utility\GeneralUtility::class, 'makeInstance', [$this->nodeFactory->createClassConstReference(\TYPO3\CMS\Core\Database\ConnectionPool::class)]), 'getConnectionForTable', [$this->nodeFactory->createArg($firstArgument->value)]);
        return new \PhpParser\Node\Expr\Assign(new \PhpParser\Node\Expr\Variable('connection'), $connection);
    }
}
