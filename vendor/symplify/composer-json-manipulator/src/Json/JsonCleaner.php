<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423\Symplify\ComposerJsonManipulator\Json;

final class JsonCleaner
{
    /**
     * @param mixed[] $data
     * @return mixed[]
     */
    public function removeEmptyKeysFromJsonArray(array $data) : array
    {
        foreach ($data as $key => $value) {
            if (!\is_array($value)) {
                continue;
            }
            if ($value === []) {
                unset($data[$key]);
            } else {
                $data[$key] = $this->removeEmptyKeysFromJsonArray($value);
            }
        }
        return $data;
    }
}
