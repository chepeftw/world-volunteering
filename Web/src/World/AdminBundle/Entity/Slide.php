<?php

namespace World\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use World\ToolBundle\Entity\BaseEntity;
use Symfony\Component\Validator\Constraints as Assert;

use World\ToolBundle\Utility\ImageUtils;

/**
 * Slide
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="World\AdminBundle\Entity\Repositories\SlideRepository")
 * @Gedmo\Uploadable( pathMethod="getPath", filenameGenerator="SHA1", allowOverwrite=true, appendNumber=true )
 * @Gedmo\Loggable
 */
class Slide extends BaseEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Gedmo\Versioned
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @Gedmo\Versioned
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     * @Gedmo\UploadableFilePath
     * @Assert\File(maxSize="100M")
     */
    private $image;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=true)
     * @Gedmo\Versioned
     */
    protected $enabled;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="date", nullable=true)
     * @Gedmo\Versioned
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="date", nullable=true)
     * @Gedmo\Versioned
     */
    private $endDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="sortOrder", type="integer", nullable=true)
     */
    protected $sortOrder;

    protected static $IMG_PATH = "uploads/slide";

    public function getImageWebPath() {
        return ImageUtils::getGenericPath( self::$IMG_PATH, '', $this->getImage() );
    }

    public function getPath() {
        return realpath('.') . '/' . self::$IMG_PATH;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->enabled = true; // Default value for column enable
        $this->sortOrder = 0; // Default value for column sortOrder
    }










    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Slide
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Slide
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Slide
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Slide
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Slide
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return Slide
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return Slide
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder
     *
     * @return integer
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }
}
