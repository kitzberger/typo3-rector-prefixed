<?php

declare (strict_types=1);
namespace Rector\Testing\PhpConfigPrinter;

use Typo3RectorPrefix20210317\Symplify\PhpConfigPrinter\Contract\YamlFileContentProviderInterface;
final class YamlFileContentProvider implements \Typo3RectorPrefix20210317\Symplify\PhpConfigPrinter\Contract\YamlFileContentProviderInterface
{
    public function setContent(string $yamlContent) : void
    {
    }
    public function getYamlContent() : string
    {
        return '';
    }
}
