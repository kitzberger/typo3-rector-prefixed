<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Reporting;

use DateTimeImmutable;
use Rector\ChangesReporting\Annotation\AnnotationExtractor;
use Ssch\TYPO3Rector\Configuration\Typo3Option;
use Typo3RectorPrefix20210411\Symplify\PackageBuilder\Parameter\ParameterProvider;
use Typo3RectorPrefix20210411\Symplify\SmartFileSystem\SmartFileInfo;
use Typo3RectorPrefix20210411\Symplify\SmartFileSystem\SmartFileSystem;
final class ReporterFactory
{
    /**
     * @var ParameterProvider
     */
    private $parameterProvider;
    /**
     * @var SmartFileSystem
     */
    private $smartFileSystem;
    /**
     * @var AnnotationExtractor
     */
    private $annotationExtractor;
    public function __construct(\Typo3RectorPrefix20210411\Symplify\PackageBuilder\Parameter\ParameterProvider $parameterProvider, \Typo3RectorPrefix20210411\Symplify\SmartFileSystem\SmartFileSystem $smartFileSystem, \Rector\ChangesReporting\Annotation\AnnotationExtractor $annotationExtractor)
    {
        $this->parameterProvider = $parameterProvider;
        $this->smartFileSystem = $smartFileSystem;
        $this->annotationExtractor = $annotationExtractor;
    }
    public function createReporter() : \Ssch\TYPO3Rector\Reporting\Reporter
    {
        $reportDirectory = (string) $this->parameterProvider->provideParameter(\Ssch\TYPO3Rector\Configuration\Typo3Option::REPORT_DIRECTORY);
        if (!$this->smartFileSystem->exists($reportDirectory)) {
            return new \Ssch\TYPO3Rector\Reporting\NullReporter();
        }
        $this->smartFileSystem->remove($reportDirectory);
        $this->smartFileSystem->mirror(__DIR__ . '/../../templates/report/', $reportDirectory);
        $reportFile = new \Typo3RectorPrefix20210411\Symplify\SmartFileSystem\SmartFileInfo(\rtrim($reportDirectory, '/') . '/index.html');
        $content = $reportFile->getContents();
        $content = \str_replace('###DATE###', (new \DateTimeImmutable())->format('d.m.Y'), $content);
        $this->smartFileSystem->dumpFile($reportFile->getRealPath(), $content);
        return new \Ssch\TYPO3Rector\Reporting\HtmlReporter($this->annotationExtractor, $reportFile, $this->smartFileSystem);
    }
}
