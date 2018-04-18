<?php

namespace MatheusHack\ItauBoleto\Helpers;

use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;

class Fractal{

    static function item($data = null, $transformer = null)
    {
        $resource = new Item($data, $transformer);
        return self::fractal($resource, $transformer);
    }

    static function collection($data = null, $transformer = null)
    {
        $resource = new Collection($data, $transformer);
        return self::fractalTransform($resource, $transformer);
    }

    static function fractalTransform($data = null, $transformer = null, $serializer = null)
    {
        $fractal = new Manager();
        return $fractal->createData($data, $transformer, $serializer);
    }
}
