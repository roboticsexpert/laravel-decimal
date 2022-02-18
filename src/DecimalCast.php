<?php


namespace Roboticsexpert\LaravelDecimal;

use Decimal\Decimal;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

//TODO write tests for this cast!
//TODO move this logic to separate package and add to composer!
class DecimalCast implements CastsAttributes
{

    private int $precision;

    public function __construct($precision = Decimal::DEFAULT_PRECISION)
    {
        $this->precision = (int)$precision;
    }


    /**
     * Prepare the given value for storage.
     *
     * @param Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes)
    {
        if (is_null($value)) {
            return null;
        }

        if ($value instanceof Decimal) {

            return $value->toFixed($this->precision);
        }

        throw new \Exception('set value should be instance of Decimal');
    }

    public function get($model, $key, $value, $attributes)
    {
        if (is_null($value))
            return null;

        return new Decimal($value,$this->precision);
    }
}

