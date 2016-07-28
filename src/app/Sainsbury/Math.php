<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Sainsbury;

/**
 * Description of Math
 *
 * @author Kamil Hurajt
 */
class Math 
{
    /**
     * Format bytes into Kb, Mb, Gb , Tb
     * @param int $size Size in bytes
     * @param int $precision default value 2
     * @return string calculated value including suffix
     */
    public static function formatBytes($size, $precision = 2)
    {
        $base = log($size, 1024);
        $suffixes = array('', 'Kb', 'M', 'G', 'T');   

        return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
    }
}
