<?php

namespace MarcW\RssWriter\Bridge\Symfony\Form\ChoiceList\Loader;

use Symfony\Component\Form\ChoiceList\Loader\ChoiceLoaderInterface;
use Symfony\Component\Form\ChoiceList\ArrayChoiceList;
use MarcW\RssWriter\Extension\Itunes\ItunesChannel;

/**
 * ItunesCategoryChoiceLoader.
 *
 * @author Marc Weistroff <marc@weistroff.net> 
 */
class ItunesCategoryChoiceLoader implements ChoiceLoaderInterface
{
    private $choiceList;

    /**
     * @param callable|null $value
     */
    public function loadChoiceList($value = null)
    {
        if ($this->choiceList) {
            return $this->choiceList;
        }

        $choices = [];
        foreach (ItunesChannel::$availableCategories as $key => $sub) {
            $choices[$key] = $key;

            foreach ($sub as $subCategory) {
                $subkey = sprintf('-- %s', $subCategory);

                $choices[$subkey] = $subCategory;
            }
        }

        $this->choiceList = new ArrayChoiceList($choices);

        return $this->choiceList;
    }

    /**
     * @param array         $values
     * @param callable|null $valueCallback
     */
    public function loadChoicesForValues(array $values, $valueCallback = null)
    {
        return $this->loadChoiceList()->getChoicesForValues($values);
    }

    /**
     * @param array         $values
     * @param callable|null $valueCallback
     */
    public function loadValuesForChoices(array $choices, $valueCallback = null)
    {
        return $this->loadChoiceList()->getValuesForChoices($choices);
    }
}

