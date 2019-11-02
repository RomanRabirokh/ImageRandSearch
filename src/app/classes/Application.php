<?php


namespace classes;

use interfaces\ImageInterface;
use classes\Log;

/**
 * Class Application
 * @package classes
 */
class Application
{
    /**
     * @var
     */
    private static $_log;

    /**
     * @var
     */
    private static $_logErrors;

    /**
     * @var ImageInterface
     */
    protected $image;

    /**
     * Application constructor.
     * @param ImageInterface $image
     */
    public function __construct(ImageInterface $image)
    {
        $this->image = $image;
    }

    /**
     *
     */
    public function run()
    {
        $this->image->getImage();
    }

    /**
     * @return \classes\Log
     */
    public static function getLog()
    {
        if (self::$_log === null) {
            self::$_log = new Log(getenv('FILE_LOGS'));
        }
        return self::$_log;
    }

    /**
     * @param $log
     */
    public static function setLog($log)
    {
        self::$_log = $log;
    }

    /**
     * @return \classes\Log
     */
    public static function getLogErrors()
    {
        if (self::$_logErrors === null) {
            self::$_logErrors = new Log(getenv('FILE_LOGS_ERRORS'));
        }
        return self::$_logErrors;
    }

    /**
     * @param $log
     */
    public static function setLogErrors($log)
    {
        self::$_logErrors = $log;
    }

    /**
     *
     */
    public function redirectToImage()
    {
        header('Location: image.jpg');
        die;
    }
}
