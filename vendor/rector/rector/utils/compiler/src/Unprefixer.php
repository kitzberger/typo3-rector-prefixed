<?php

declare (strict_types=1);
namespace Rector\Compiler;

use Typo3RectorPrefix20210423\Nette\Utils\Strings;
final class Unprefixer
{
    /**
     * @var string
     * @see https://regex101.com/r/P8sXfr/1
     */
    private const QUOTED_VALUE_REGEX = '#\'\\\\(\\w|@)#';
    public static function unprefixQuoted(string $content, string $prefix) : string
    {
        $match = \sprintf('\'%s\\\\r\\\\n\'', $prefix);
        $content = \Typo3RectorPrefix20210423\Nette\Utils\Strings::replace($content, '#' . $match . '#', '\'\\\\r\\\\n\'');
        $match = \sprintf('\'%s\\\\', $prefix);
        $content = \Typo3RectorPrefix20210423\Nette\Utils\Strings::replace($content, '#' . $match . '#', "'");
        $match = \sprintf('\'%s\\\\\\\\', $prefix);
        $content = \Typo3RectorPrefix20210423\Nette\Utils\Strings::replace($content, '#' . $match . '#', "'");
        return self::unPreSlashQuotedValues($content);
    }
    private static function unPreSlashQuotedValues(string $content) : string
    {
        return \Typo3RectorPrefix20210423\Nette\Utils\Strings::replace($content, self::QUOTED_VALUE_REGEX, "'\$1");
    }
}
