<?php

declare (strict_types=1);
namespace Rector\Tests\NetteToSymfony\Rector\MethodCall\NetteFormToSymfonyFormRector\Source;

use Typo3RectorPrefix20210412\Nette\Application\IPresenter;
use Typo3RectorPrefix20210412\Nette\Application\IResponse;
use Typo3RectorPrefix20210412\Nette\Application\Request;
abstract class NettePresenter implements \Typo3RectorPrefix20210412\Nette\Application\IPresenter
{
    public function run(\Typo3RectorPrefix20210412\Nette\Application\Request $request) : \Typo3RectorPrefix20210412\Nette\Application\IResponse
    {
    }
}
