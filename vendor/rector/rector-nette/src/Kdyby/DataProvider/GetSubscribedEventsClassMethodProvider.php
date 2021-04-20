<?php

declare (strict_types=1);
namespace Rector\Nette\Kdyby\DataProvider;

use PhpParser\Node\Stmt\ClassMethod;
use Rector\NodeCollector\NodeCollector\NodeRepository;
final class GetSubscribedEventsClassMethodProvider
{
    /**
     * @var NodeRepository
     */
    private $nodeRepository;
    public function __construct(\Rector\NodeCollector\NodeCollector\NodeRepository $nodeRepository)
    {
        $this->nodeRepository = $nodeRepository;
    }
    /**
     * @return ClassMethod[]
     */
    public function provide() : array
    {
        return $this->nodeRepository->findClassMethodByTypeAndMethod('Typo3RectorPrefix20210420\\Kdyby\\Events\\Subscriber', 'getSubscribedEvents');
    }
}
