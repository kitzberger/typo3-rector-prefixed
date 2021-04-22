<?php

namespace Typo3RectorPrefix20210422;

if (\function_exists('mock')) {
    return;
}
function mock() : \Typo3RectorPrefix20210422\Mockery\MockInterface
{
    return new \Typo3RectorPrefix20210422\DummyMock();
}
