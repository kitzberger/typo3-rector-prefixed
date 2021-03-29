<?php

declare (strict_types=1);
namespace Rector\Nette\Tests\Rector\MethodCall\ContextGetByTypeToConstructorInjectionRector\Source;

use Typo3RectorPrefix20210329\Nette\Application\IPresenter;
use Typo3RectorPrefix20210329\Nette\Application\IResponse;
use Typo3RectorPrefix20210329\Nette\Application\Request;
abstract class ConstructorInjectionParentPresenter implements \Typo3RectorPrefix20210329\Nette\Application\IPresenter
{
    /**
     * @var SomeTypeToInject
     */
    private $someTypeToInject;
    public function __construct(\Rector\Nette\Tests\Rector\MethodCall\ContextGetByTypeToConstructorInjectionRector\Source\SomeTypeToInject $someTypeToInject)
    {
        $this->someTypeToInject = $someTypeToInject;
    }
    function run(\Typo3RectorPrefix20210329\Nette\Application\Request $request) : \Typo3RectorPrefix20210329\Nette\Application\IResponse
    {
    }
}
