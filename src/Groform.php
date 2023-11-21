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

    /**
     * Access a property in an object by dot notation
     * @param $object
     * @param string $path
     * @return mixed
     */
    public static function accessProperty($object, string $path)
    {
        //Handle arrays (if path = address[address1] > $object['address']['address1'])
        $path = str_replace(']', '', str_replace('[', '.', $path));
        $expl = explode('.', $path);
        if(count($expl) > 1) {
            try {
                $res = $object[$expl[0]];
                foreach ($expl as $i => $v) {
                    if ($i > 0) {
                        $res = $res[$v];
                    }
                }
                return $res;
            } catch (\Exception $e) {}
        }

        if(is_array($object)) {
            try {
                if(is_string($object[$path])) {
                    $date = Carbon::parse($object[$path]);
                    return $date;
                }
            } catch (\Exception $e) {
                //its not a date, continue
            }

            return $object[$path] ?? null;
        }

        return array_reduce(explode('.', $path), function ($o, $p) {
            return is_numeric($p) ? ($o[$p] ?? null) : ($o->$p ?? null);
        }, $object);
    }
}
