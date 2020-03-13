<?php


namespace App\Traits;


use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionException;

trait InteractsWithClassConstants
{
    /**
     * @return Collection
     */
    public static function all() : Collection
    {
        return (new self())->extractConstantsAsKeyValue();
    }

    /**
     * @param $key
     * @return string
     */
    public static function get($key) : ?string
    {
        $constants = (new self())->extractConstantsAsKeyValue()->flip();

        return $constants->get($key);
    }

    /**
     * @return Collection
     */
    private function extractConstantsAsKeyValue() : Collection
    {
        try {
            $constants = (new ReflectionClass(self::class))->getConstants();
        } catch (ReflectionException $exception) {
            $constants = [];
        }

        return collect($constants)->flatMap(function ($id, $constant) {
            return [
                Str::title(str_replace('_', ' ', $constant)) => $id
            ];
        });
    }


}
