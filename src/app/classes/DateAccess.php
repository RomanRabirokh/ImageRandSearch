<?php

namespace classes;

use interfaces\AccessInterface;

/**
 * Class DateAccess
 * @package classes
 */
class DateAccess implements AccessInterface
{
    /**
     * @var array|false|string
     */
    protected $file;

    /**
     * @var bool
     */
    protected $check = false;

    /**
     * DateAccess constructor.
     */
    public function __construct()
    {
        $this->file = getenv('FILE_ACCESS');
    }

    /**
     * @return bool
     */
    public function getAccess(): bool
    {
        if ($this->check) {
            return $this->compareDate();
        } else return true;

    }

    /**
     *
     */
    public function setAccess(): void
    {
        try {
            file_put_contents(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $this->file, time());

        } catch (\Exception $exception) {
            Application::getLogErrors()->saveLog($exception->getMessage());
        }

    }


    /**
     * @return bool|false|string
     */
    protected function getDateFromFile()
    {
        $file = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $this->file;
        if (is_file($file)) {
            return file_get_contents($file);
        } else {
            return false;
        }


    }

    /**
     * @return bool
     */
    function compareDate()
    {
        $oldDate = $this->getDateFromFile();

        if (!$oldDate) {
            return true;
        }
        $curDate = date('Y-m-d H:i:s');

        $interval = '+1 day';
        //$interval = '+1 minutes';
        $interval = date('Y-m-d H:i:s', strtotime($interval, $oldDate));

        if (strtotime($interval) <= strtotime($curDate)) {
            return true;
        } else {
            return false;
        }

    }
}
