<?php

declare (strict_types=1);
namespace Rector\ChangesReporting\ValueObject;

use Rector\Core\Contract\Rector\RectorInterface;
final class RectorWithLineChange
{
    /**
     * @var int
     */
    private $line;
    /**
     * @var RectorInterface
     */
    private $rector;
    public function __construct(\Rector\Core\Contract\Rector\RectorInterface $rector, int $line)
    {
        $this->rector = $rector;
        $this->line = $line;
    }
    /**
     * @return class-string<RectorInterface>
     */
    public function getRectorClass() : string
    {
        return \get_class($this->rector);
    }
    public function getLine() : int
    {
        return $this->line;
    }
}
