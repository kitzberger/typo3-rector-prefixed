<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422\Doctrine\Inflector\Rules;

final class Substitution
{
    /** @var Word */
    private $from;
    /** @var Word */
    private $to;
    public function __construct(\Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word $from, \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word $to)
    {
        $this->from = $from;
        $this->to = $to;
    }
    public function getFrom() : \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word
    {
        return $this->from;
    }
    public function getTo() : \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word
    {
        return $this->to;
    }
}
