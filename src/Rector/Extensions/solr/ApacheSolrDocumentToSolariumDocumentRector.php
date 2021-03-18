<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Rector\Extensions\solr;

use Typo3RectorPrefix20210318\Apache_Solr_Document;
use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Identifier;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
/**
 * @see https://docs.typo3.org/p/apache-solr-for-typo3/solr/10.0/en-us/Releases/solr-release-9-0.html
 */
final class ApacheSolrDocumentToSolariumDocumentRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @return string[]
     */
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Expr\MethodCall::class];
    }
    /**
     * @param MethodCall $node
     */
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node
    {
        if (!$this->nodeTypeResolver->isMethodStaticCallOrClassMethodObjectType($node, \Typo3RectorPrefix20210318\Apache_Solr_Document::class)) {
            return null;
        }
        if (!$this->isName($node->name, 'setMultiValue')) {
            return null;
        }
        $node->name = new \PhpParser\Node\Identifier('addField');
        return $node;
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Apache_Solr_Document to solarium based document', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
$document = new Apache_Solr_Document();
$document->setMultiValue('foo', 'bar', true);
CODE_SAMPLE
, <<<'CODE_SAMPLE'
$document = new Apache_Solr_Document();
$document->addField('foo', 'bar', true);
CODE_SAMPLE
)]);
    }
}
