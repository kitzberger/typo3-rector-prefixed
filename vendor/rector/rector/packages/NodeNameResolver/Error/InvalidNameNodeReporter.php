<?php

declare (strict_types=1);
namespace Rector\NodeNameResolver\Error;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\StaticCall;
use Rector\Core\Contract\Rector\RectorInterface;
use Rector\Core\Exception\ShouldNotHappenException;
use Rector\Core\PhpParser\Printer\BetterStandardPrinter;
use Rector\Core\Provider\CurrentFileProvider;
use Rector\Core\ValueObject\Application\File;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo;
final class InvalidNameNodeReporter
{
    /**
     * @var string
     */
    private const FILE = 'file';
    /**
     * @var CurrentFileProvider
     */
    private $currentFileProvider;
    /**
     * @var BetterStandardPrinter
     */
    private $betterStandardPrinter;
    public function __construct(\Rector\Core\Provider\CurrentFileProvider $currentFileProvider, \Rector\Core\PhpParser\Printer\BetterStandardPrinter $betterStandardPrinter)
    {
        $this->currentFileProvider = $currentFileProvider;
        $this->betterStandardPrinter = $betterStandardPrinter;
    }
    /**
     * @param MethodCall|StaticCall $node
     */
    public function reportInvalidNodeForName(\PhpParser\Node $node) : void
    {
        $message = \sprintf('Pick more specific node than "%s", e.g. "$node->name"', \get_class($node));
        $file = $this->currentFileProvider->getFile();
        if ($file instanceof \Rector\Core\ValueObject\Application\File) {
            $smartFileInfo = $file->getSmartFileInfo();
            $message .= \PHP_EOL . \PHP_EOL;
            $message .= \sprintf('Caused in "%s" file on line %d on code "%s"', $smartFileInfo->getRelativeFilePathFromCwd(), $node->getStartLine(), $this->betterStandardPrinter->print($node));
        }
        $backtrace = \debug_backtrace();
        $rectorBacktrace = $this->matchRectorBacktraceCall($backtrace);
        if ($rectorBacktrace) {
            // issues to find the file in prefixed
            if (\file_exists($rectorBacktrace[self::FILE])) {
                $smartFileInfo = new \Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo($rectorBacktrace[self::FILE]);
                $fileAndLine = $smartFileInfo->getRelativeFilePathFromCwd() . ':' . $rectorBacktrace['line'];
            } else {
                $fileAndLine = $rectorBacktrace[self::FILE] . ':' . $rectorBacktrace['line'];
            }
            $message .= \PHP_EOL . \PHP_EOL;
            $message .= \sprintf('Look at "%s"', $fileAndLine);
        }
        throw new \Rector\Core\Exception\ShouldNotHappenException($message);
    }
    /**
     * @param mixed[] $backtrace
     * @return string[]|null
     */
    private function matchRectorBacktraceCall(array $backtrace) : ?array
    {
        foreach ($backtrace as $singleBacktrace) {
            if (!isset($singleBacktrace['object'])) {
                continue;
            }
            // match a Rector class
            if (!\is_a($singleBacktrace['object'], \Rector\Core\Contract\Rector\RectorInterface::class)) {
                continue;
            }
            return $singleBacktrace;
        }
        return $backtrace[1] ?? null;
    }
}
