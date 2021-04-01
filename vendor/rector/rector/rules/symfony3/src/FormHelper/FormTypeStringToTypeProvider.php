<?php

declare (strict_types=1);
namespace Rector\Symfony3\FormHelper;

use Typo3RectorPrefix20210401\Nette\Utils\Strings;
use Rector\Symfony\Contract\Tag\TagInterface;
use Rector\Symfony\ServiceMapProvider;
final class FormTypeStringToTypeProvider
{
    /**
     * @var array<string, string>
     */
    private const SYMFONY_CORE_NAME_TO_TYPE_MAP = ['form' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType', 'birthday' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\BirthdayType', 'checkbox' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\CheckboxType', 'collection' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\CollectionType', 'country' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\CountryType', 'currency' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\CurrencyType', 'date' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\DateType', 'datetime' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\DatetimeType', 'email' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\EmailType', 'file' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\FileType', 'hidden' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\HiddenType', 'integer' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\IntegerType', 'language' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\LanguageType', 'locale' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\LocaleType', 'money' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\MoneyType', 'number' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\NumberType', 'password' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\PasswordType', 'percent' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\PercentType', 'radio' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\RadioType', 'range' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\RangeType', 'repeated' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\RepeatedType', 'search' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\SearchType', 'textarea' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\TextareaType', 'text' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\TextType', 'time' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\TimeType', 'timezone' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\TimezoneType', 'url' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\UrlType', 'button' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\ButtonType', 'submit' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\SubmitType', 'reset' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\ResetType', 'entity' => 'Typo3RectorPrefix20210401\\Symfony\\Bridge\\Doctrine\\Form\\Type\\EntityType', 'choice' => 'Typo3RectorPrefix20210401\\Symfony\\Component\\Form\\Extension\\Core\\Type\\ChoiceType'];
    /**
     * @var array<string, string>
     */
    private $customServiceFormTypeByAlias = [];
    /**
     * @var ServiceMapProvider
     */
    private $serviceMapProvider;
    public function __construct(\Rector\Symfony\ServiceMapProvider $serviceMapProvider)
    {
        $this->serviceMapProvider = $serviceMapProvider;
    }
    public function matchClassForNameWithPrefix(string $name) : ?string
    {
        $nameToTypeMap = $this->getNameToTypeMap();
        if (\Typo3RectorPrefix20210401\Nette\Utils\Strings::startsWith($name, 'form.type.')) {
            $name = \Typo3RectorPrefix20210401\Nette\Utils\Strings::substring($name, \strlen('form.type.'));
        }
        return $nameToTypeMap[$name] ?? null;
    }
    /**
     * @return array<string, string>
     */
    private function getNameToTypeMap() : array
    {
        $customServiceFormTypeByAlias = $this->provideCustomServiceFormTypeByAliasFromContainerXml();
        return \array_merge(self::SYMFONY_CORE_NAME_TO_TYPE_MAP, $customServiceFormTypeByAlias);
    }
    /**
     * @return array<string, string>
     */
    private function provideCustomServiceFormTypeByAliasFromContainerXml() : array
    {
        if ($this->customServiceFormTypeByAlias !== []) {
            return $this->customServiceFormTypeByAlias;
        }
        $serviceMap = $this->serviceMapProvider->provide();
        $formTypeServiceDefinitions = $serviceMap->getServicesByTag('form.type');
        foreach ($formTypeServiceDefinitions as $formTypeServiceDefinition) {
            $formTypeTag = $formTypeServiceDefinition->getTag('form.type');
            if (!$formTypeTag instanceof \Rector\Symfony\Contract\Tag\TagInterface) {
                continue;
            }
            $alias = $formTypeTag->getData()['alias'] ?? null;
            if (!\is_string($alias)) {
                continue;
            }
            $class = $formTypeServiceDefinition->getClass();
            if ($class === null) {
                continue;
            }
            $this->customServiceFormTypeByAlias[$alias] = $class;
        }
        return $this->customServiceFormTypeByAlias;
    }
}
