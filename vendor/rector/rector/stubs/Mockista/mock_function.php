<?php

namespace Typo3RectorPrefix20210410;

if (\function_exists('Typo3RectorPrefix20210410\\mock')) {
    return;
}
function mock() : \Typo3RectorPrefix20210410\Mockery\MockInterface
{
    return new \Typo3RectorPrefix20210410\DummyMock();
}
