<?php

namespace interfaces;

/**
 * Interface ImageSearch
 * @package interfaces
 */
interface ImageSearch
{
    /**
     * @param string $searchText
     * @param int $number
     * @return string
     */
    public function getImage(string $searchText, int $number): string;
}
