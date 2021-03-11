<?php

declare (strict_types=1);
namespace Rector\Core\Differ;

use Typo3RectorPrefix20210311\SebastianBergmann\Diff\Differ;
use Typo3RectorPrefix20210311\SebastianBergmann\Diff\Output\StrictUnifiedDiffOutputBuilder;
final class DefaultDiffer
{
    /**
     * @var Differ
     */
    private $differ;
    public function __construct()
    {
        $strictUnifiedDiffOutputBuilder = new \Typo3RectorPrefix20210311\SebastianBergmann\Diff\Output\StrictUnifiedDiffOutputBuilder(['fromFile' => 'Original', 'toFile' => 'New']);
        $this->differ = new \Typo3RectorPrefix20210311\SebastianBergmann\Diff\Differ($strictUnifiedDiffOutputBuilder);
    }
    public function diff(string $old, string $new) : string
    {
        if ($old === $new) {
            return '';
        }
        return $this->differ->diff($old, $new);
    }
}
