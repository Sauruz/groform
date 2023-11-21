<?php

namespace Sauruz\Groform;

class Groform
{
    /**
     * @param string $formName
     * @param null $model
     * @return false|mixed
     * @throws \Exception
     */
    public static function form(string $formName, $model = null)
    {
        if (is_file(resource_path("/groforms/{$formName}.groform.php"))) {
            return include resource_path("/groforms/{$formName}.groform.php");
        } else if (is_file(__DIR__ . "/groforms/{$formName}.groform.php")) {
            return include __DIR__ . "/groforms/{$formName}.groform.php";
        } else {
            throw new \Exception("resources/forms/{$formName}.groform.php not found");
        }
    }

    /**
     * @param string $formName
     * @param null $model
     * @return array
     *
     * @throws \Exception
     */
    public static function validationRules(string $formName, $model = null): array
    {
        if (is_file(resource_path() . "/groforms/{$formName}.groform.php")) {
            $form = include resource_path() . "/groforms/{$formName}.groform.php";
            $rules = [];
            foreach ($form['sections'] as $section) {
                foreach ($section['fields'] as $item) {
                    if (isset($item['rule']) && $item['rule']) {
                        $rules[$item['id']] = $item['rule'];
                    }
                }
            }

            return $rules;
        } else {
            throw new \Exception("resources/groforms/{$formName}.groform.php not found");
        }
    }

    /**
     * @param string $arrayNotation
     * @return string
     * item[name] > item.name
     */
    public static function arrayToDotNotation(string $arrayNotation)
    {
        return str_replace(']', '', str_replace('[', '.', $arrayNotation));
    }

    /**
     * Set required attribute
     * @param $item
     * @return string
     */
    public static function formSetRequired($item)
    {
        if (isset($item['rule'])) {
            if (is_string($item['rule']) && str_contains($item['rule'], 'required')) {
                return 'required aria-required';
            }
            if (is_array($item['rule']) && in_array('required', $item['rule'])) {
                return 'required aria-required';
            }
        }
        return '';
    }
}
