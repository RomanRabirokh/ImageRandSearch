<?php

namespace classes;

use interfaces\FileInterface;

/**
 * Class File
 * @package classes
 */
class File implements FileInterface
{
    /**
     * @param string $url
     * @return bool
     */
    public function save(string $url): bool
    {
        $img = dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'image.jpg';
        Application::getLog()->saveLog("Url: $url");
        file_put_contents($img, file_get_contents($url));
        return true;
    }
}
