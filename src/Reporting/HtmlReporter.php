<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Reporting;

use Rector\ChangesReporting\Annotation\AnnotationExtractor;
use ReflectionClass;
use Ssch\TYPO3Rector\Reporting\ValueObject\Report;
use Typo3RectorPrefix20210413\Symplify\SmartFileSystem\SmartFileInfo;
use Typo3RectorPrefix20210413\Symplify\SmartFileSystem\SmartFileSystem;
final class HtmlReporter implements \Ssch\TYPO3Rector\Reporting\Reporter
{
    /**
     * @var string
     */
    private const APPEND_MARKER = '<!--APPEND-->';
    /**
     * @var AnnotationExtractor
     */
    private $annotationExtractor;
    /**
     * @var SmartFileInfo
     */
    private $reportFile;
    /**
     * @var SmartFileSystem
     */
    private $smartFileSystem;
    public function __construct(\Rector\ChangesReporting\Annotation\AnnotationExtractor $annotationExtractor, \Typo3RectorPrefix20210413\Symplify\SmartFileSystem\SmartFileInfo $reportFile, \Typo3RectorPrefix20210413\Symplify\SmartFileSystem\SmartFileSystem $smartFileSystem)
    {
        $this->annotationExtractor = $annotationExtractor;
        $this->reportFile = $reportFile;
        $this->smartFileSystem = $smartFileSystem;
    }
    public function report(\Ssch\TYPO3Rector\Reporting\ValueObject\Report $report) : void
    {
        $rectorReflection = new \ReflectionClass($report->getRector());
        $recordData = ['rector' => $rectorReflection->getShortName(), 'file' => \sprintf('<a href="file:///%s" target="_blank" rel="noopener">%s</a>', $report->getSmartFileInfo()->getRealPath(), $report->getSmartFileInfo()->getBasename()), 'changelog' => '-', 'suggestions' => '-'];
        $changelog = $this->annotationExtractor->extractAnnotationFromClass($rectorReflection->getName(), '@changelog');
        if (null !== $changelog) {
            $recordData['changelog'] = \sprintf('<a href="%s" target="_blank" rel="noopener">Changelog</a>', $changelog);
        }
        if ([] !== $report->getSuggestions()) {
            $recordData['suggestions'] = \implode('<br />', $report->getSuggestions());
        }
        $html = [];
        $html[] = '<tr class="report-table__row">';
        foreach ($recordData as $cell) {
            $html[] = \sprintf('<td class="report-table__row-cell">%s</td>', $cell);
        }
        $html[] = '</tr>';
        $html[] = self::APPEND_MARKER;
        $content = $this->reportFile->getContents();
        $content = \str_replace(self::APPEND_MARKER, \implode("\n", $html), $content);
        $this->smartFileSystem->dumpFile($this->reportFile->getRealPath(), $content);
    }
}
