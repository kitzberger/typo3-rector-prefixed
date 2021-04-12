<?php

namespace Typo3RectorPrefix20210412;

if (\function_exists('Typo3RectorPrefix20210412\\mock')) {
    return;
}
function mock() : \Typo3RectorPrefix20210412\Mockery\MockInterface
{
    return new \Typo3RectorPrefix20210412\DummyMock();
}
