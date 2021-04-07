<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210407\Symplify\SymplifyKernel\Strings;

use Typo3RectorPrefix20210407\Nette\Utils\Strings;
use Typo3RectorPrefix20210407\Symplify\SymplifyKernel\Exception\HttpKernel\TooGenericKernelClassException;
use Typo3RectorPrefix20210407\Symplify\SymplifyKernel\HttpKernel\AbstractSymplifyKernel;
final class KernelUniqueHasher
{
    /**
     * @var StringsConverter
     */
    private $stringsConverter;
    public function __construct()
    {
        $this->stringsConverter = new \Typo3RectorPrefix20210407\Symplify\SymplifyKernel\Strings\StringsConverter();
    }
    public function hashKernelClass(string $kernelClass) : string
    {
        $this->ensureIsNotGenericKernelClass($kernelClass);
        $shortClassName = (string) \Typo3RectorPrefix20210407\Nette\Utils\Strings::after($kernelClass, '\\', -1);
        return $this->stringsConverter->camelCaseToGlue($shortClassName, '_');
    }
    private function ensureIsNotGenericKernelClass(string $kernelClass) : void
    {
        if ($kernelClass !== \Typo3RectorPrefix20210407\Symplify\SymplifyKernel\HttpKernel\AbstractSymplifyKernel::class) {
            return;
        }
        $message = \sprintf('Instead of "%s", provide final Kernel class', \Typo3RectorPrefix20210407\Symplify\SymplifyKernel\HttpKernel\AbstractSymplifyKernel::class);
        throw new \Typo3RectorPrefix20210407\Symplify\SymplifyKernel\Exception\HttpKernel\TooGenericKernelClassException($message);
    }
}
