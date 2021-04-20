<?php

namespace Typo3RectorPrefix20210420;

if (\function_exists('mock')) {
    return;
}
function mock() : \Typo3RectorPrefix20210420\Mockery\MockInterface
{
    return new \Typo3RectorPrefix20210420\DummyMock();
}
