<?php

namespace classes;

use interfaces\ImageText;

/**
 * Class ImageTextCsv
 * @package classes
 */
class ImageTextCsv implements ImageText
{
    /**
     * @var array|false|string
     */
    protected $fileNames;

    /**
     * @var array|false|string
     */
    protected $fileNameSigns;

    /**
     * ImageTextCsv constructor.
     */
    public function __construct()
    {
        $this->fileNames = getenv('FILE_NAMES');
        $this->fileNameSigns = getenv('FILE_SIGNS');
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        $names = $this->getNamesFromCsv($this->fileNames);

        $signs = $this->getNamesFromCsv($this->fileNameSigns);


        return $this->getRandName($names, $signs);
    }

    /**
     * @param $filename
     * @return array
     */
    protected function getNamesFromCsv($filename)
    {
        try {
            $lines = file_get_contents(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $filename);
            if (!$lines) {
                throw new \Exception('Not found file ' . $filename);
            }
            $data = explode(PHP_EOL, $lines);
        } catch (\Exception $exception) {
            Application::getLogErrors()->saveLog($exception->getMessage());
        }

        return $data;
    }

    /**
     * @param $names
     * @param $signs
     * @return string
     */
    protected function getRandName($names, $signs)
    {
        $randName = trim($names[rand(0, count($names) - 1)]);
        $randSign = trim($signs[rand(0, count($signs) - 1)]);

        $text = "{$randName} {$randSign}";

        Application::getLog()->saveLog($text, true);

        return $text;
    }
}
