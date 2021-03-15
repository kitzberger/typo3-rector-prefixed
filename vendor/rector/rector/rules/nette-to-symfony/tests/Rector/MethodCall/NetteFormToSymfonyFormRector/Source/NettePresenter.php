<?php

declare (strict_types=1);
namespace Rector\NetteToSymfony\Tests\Rector\MethodCall\NetteFormToSymfonyFormRector\Source;

use Typo3RectorPrefix20210315\Nette\Application\IPresenter;
use Typo3RectorPrefix20210315\Nette\Application\IResponse;
use Typo3RectorPrefix20210315\Nette\Application\Request;
abstract class NettePresenter implements \Typo3RectorPrefix20210315\Nette\Application\IPresenter
{
    public function run(\Typo3RectorPrefix20210315\Nette\Application\Request $request) : \Typo3RectorPrefix20210315\Nette\Application\IResponse
    {
    }
}
