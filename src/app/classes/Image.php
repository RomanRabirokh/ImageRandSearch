<?php

namespace classes;

use interfaces\AccessInterface;
use interfaces\FileInterface;
use interfaces\ImageInterface;
use interfaces\ImageSearch;
use interfaces\ImageText;
use interfaces\LogInterface;

/**
 * Class Image
 * @package classes
 */
class Image implements ImageInterface
{
    /**
     * @var FileInterface
     */
    protected $file;

    /**
     * @var AccessInterface
     */
    protected $access;

    /**
     * @var ImageSearch
     */
    protected $search;

    /**
     * @var ImageText
     */
    protected $text;

    /**
     * Image constructor.
     * @param FileInterface $file
     * @param ImageSearch $imageSearch
     * @param ImageText $imageText
     * @param AccessInterface $access
     */
    public function __construct(FileInterface $file, ImageSearch $imageSearch, ImageText $imageText, AccessInterface $access)
    {
        $this->file = $file;
        $this->search = $imageSearch;
        $this->text = $imageText;
        $this->access = $access;

    }

    /**
     *
     */
    public function getImage(): void
    {
        if (!$this->access->getAccess()) {
            $this->redirectToImage();
        }

        $text = $this->text->getText();

        $image = $this->search->getImage($text, $this->getRandImage());

        $this->file->save($image);

        $this->access->setAccess();
    }

    /**
     *
     */
    public function redirectToImage()
    {
        header('Location: image.jpg');
        die;
    }

    /**
     * @return int
     */
    protected function getRandImage()
    {
        return rand(0, 100);
    }
}
