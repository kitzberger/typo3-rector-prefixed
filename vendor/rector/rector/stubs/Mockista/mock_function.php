<?php

namespace Typo3RectorPrefix20210409;

if (\function_exists('Typo3RectorPrefix20210409\\mock')) {
    return;
}
function mock() : \Typo3RectorPrefix20210409\Mockery\MockInterface
{
    return new \Typo3RectorPrefix20210409\DummyMock();
}
