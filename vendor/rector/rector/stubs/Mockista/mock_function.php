<?php

namespace Typo3RectorPrefix20210421;

if (\function_exists('mock')) {
    return;
}
function mock() : \Typo3RectorPrefix20210421\Mockery\MockInterface
{
    return new \Typo3RectorPrefix20210421\DummyMock();
}
