<?php

namespace Typo3RectorPrefix20210423;

if (\function_exists('mock')) {
    return;
}
function mock() : \Typo3RectorPrefix20210423\Mockery\MockInterface
{
    return new \Typo3RectorPrefix20210423\DummyMock();
}
