<?php

namespace interfaces;

/**
 * Interface LogInterface
 * @package interfaces
 */
interface LogInterface
{
    /**
     * LogInterface constructor.
     * @param $fileLogs
     */
    public function __construct($fileLogs);

    /**
     * @param $text
     * @param bool $addTime
     */
    public function saveLog($text, $addTime = false): void;
}
