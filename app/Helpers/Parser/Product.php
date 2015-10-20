<?php
namespace App\Helpers\Parser;

/**
 * Class Product
 * @package App\Helpers\Parser
 */
class Product
{
    /**
     * @var string
     */
    protected $_title;

    /**
     * @var string
     */
    protected $_image;

    /**
     * @var string
     */
    protected $_price;

    /**
     * @var string
     */
    protected $_description;

    /**
     * @var \DateTime
     */
    protected $_datetime;

    public function __construct()
    {
        $this->_datetime = new \DateTime('now');
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->_description = $description;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->_price;
    }

    /**
     * @param string $price
     */
    public function setPrice($price)
    {
        $this->_price = $price;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->_image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->_image = $image;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }

    /**
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->_datetime;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'title' => $this->getTitle(),
            'price' => $this->getPrice(),
            'image' => $this->getImage(),
            'description' => $this->getDescription(),
            'parseTime' => $this->getDatetime()->format('c')
        ];
    }
}