<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Http;

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Core\SystemEnvironmentBuilder;
if (\class_exists(\TYPO3\CMS\Core\Http\ApplicationType::class)) {
    return;
}
class ApplicationType
{
    private function __construct(string $type)
    {
    }
    public static function fromRequest(\Psr\Http\Message\ServerRequestInterface $request) : self
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
