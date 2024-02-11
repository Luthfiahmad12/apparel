<?php

if (!function_exists('formatRupiah')) {
    /**
     * Format nilai ke format rupiah.
     *
     * @param  int|float  $value
     * @return string
     */
    function formatRupiah($value)
    {
        return 'Rp ' . number_format($value, 0, ',', '.');
    }
}
