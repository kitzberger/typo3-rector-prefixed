<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Reporting\ValueObject;

use Rector\Core\Contract\Rector\RectorInterface;
use Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo;
final class Report
{
    /**
     * @var string
     */
    private $message;
    /**
     * @var RectorInterface
     */
    private $rector;
    /**
     * @var SmartFileInfo
     */
    private $smartFileInfo;
    /**
     * @var string[]
     */
    private $suggestions = [];
    /**
     * @param string[] $suggestions
     */
    public function __construct(string $message, \Rector\Core\Contract\Rector\RectorInterface $rector, \Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo, array $suggestions = [])
    {
        $this->message = $message;
        $this->rector = $rector;
        $this->smartFileInfo = $smartFileInfo;
        $this->suggestions = $suggestions;
    }
    public function getMessage() : string
    {
        return $this->message;
    }
    public function getRector() : \Rector\Core\Contract\Rector\RectorInterface
    {
        return $this->rector;
    }
    public function getSmartFileInfo() : \Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo
    {
        return $this->smartFileInfo;
    }
    public function getSuggestions() : array
    {
        return $this->suggestions;
    }
}