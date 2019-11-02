<?php

namespace classes;

use interfaces\LogInterface;

/**
 * Class Log
 * @package classes
 */
class Log implements LogInterface
{
    /**
     * @var
     */
    protected $file;

    /**
     * Log constructor.
     * @param $fileLogs
     */
    public function __construct($fileLogs)
    {
        $this->file = $fileLogs;
    }

    /**
     * @param $text
     * @param bool $addTime
     */
    public function saveLog($text, $addTime = false): void
    {

        if ($addTime) {
            $text = PHP_EOL . 'Time:' . date('Y-m-d H:i:s') . PHP_EOL . $text . PHP_EOL;
        } else {
            $text .= PHP_EOL;
        }

        file_put_contents(dirname(__DIR__,2). DIRECTORY_SEPARATOR.'files'. DIRECTORY_SEPARATOR . $this->file, $text, FILE_APPEND);
    }
}
