<?php

namespace Plugo\Service\Slugify;

class Slugify {

    public static function strToSlug(string $str): string{

        return strtolower($str);

    }

}