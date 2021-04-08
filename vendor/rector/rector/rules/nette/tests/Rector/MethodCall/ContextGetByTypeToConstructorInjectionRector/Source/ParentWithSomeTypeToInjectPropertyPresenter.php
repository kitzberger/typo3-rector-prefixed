<?php

declare (strict_types=1);
namespace Rector\Nette\Tests\Rector\MethodCall\ContextGetByTypeToConstructorInjectionRector\Source;

use Typo3RectorPrefix20210408\Nette\Application\IPresenter;
use Typo3RectorPrefix20210408\Nette\Application\IResponse;
use Typo3RectorPrefix20210408\Nette\Application\Request;
class ParentWithSomeTypeToInjectPropertyPresenter implements \Typo3RectorPrefix20210408\Nette\Application\IPresenter
{
    /**
     * @var SomeTypeToInject
     */
    protected $someTypeToInject;
    public function __construct(\Rector\Nette\Tests\Rector\MethodCall\ContextGetByTypeToConstructorInjectionRector\Source\SomeTypeToInject $someTypeToInject)
    {
        $this->someTypeToInject = $someTypeToInject;
    }
    function run(\Typo3RectorPrefix20210408\Nette\Application\Request $request) : \Typo3RectorPrefix20210408\Nette\Application\IResponse
    {
    }
}
