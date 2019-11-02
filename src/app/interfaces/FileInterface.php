<?php

namespace interfaces;

/**
 * Interface FileInterface
 * @package interfaces
 */
interface  FileInterface
{
    /**
     * @param string $file
     * @return bool
     */
    public function save(string $file): bool;
}
