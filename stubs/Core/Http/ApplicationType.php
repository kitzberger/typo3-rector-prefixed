<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Http;

use Typo3RectorPrefix20210302\Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Core\SystemEnvironmentBuilder;
if (\class_exists(\TYPO3\CMS\Core\Http\ApplicationType::class)) {
    return;
}
final class ApplicationType
{
    private function __construct(string $type)
    {
    }
    public static function fromRequest(\Typo3RectorPrefix20210302\Psr\Http\Message\ServerRequestInterface $request) : self
    {
        return new self('foo');
    }
    public function isFrontend() : bool
    {
        return \true;
    }
    public function isBackend() : bool
    {
        return \true;
    }
}
