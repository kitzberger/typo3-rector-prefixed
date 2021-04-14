<?php

namespace Typo3RectorPrefix20210414;

if (\function_exists('Typo3RectorPrefix20210414\\mock')) {
    return;
}
function mock() : \Typo3RectorPrefix20210414\Mockery\MockInterface
{
    return new \Typo3RectorPrefix20210414\DummyMock();
}
