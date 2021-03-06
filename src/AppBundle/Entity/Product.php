<?php
/**
 * Created by PhpStorm.
 * User: j.briere
 * Date: 16/10/2017
 * Time: 14:05
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="jardin")
 */
class Product
{
    /**
     * @var
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var
     * @ORM\Column(type="string", length=40)
     */
    private $code;

    /**
     * @var
     * @ORM\Column(type="integer", nullable=true)
     */
    private $merch;

    /**
     * @var
     * @ORM\Column(type="string", length=40)
     */
    private $type;

    /**
     * @var
     * @ORM\Column(type="string", length=150)
     */
    private $title;

    /**
     * @var
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $subtitle;

    /**
     * @var
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @var
     * @ORM\Column(type="text", nullable=true)
     */
    private $origins;

    /**
     * @var
     * @ORM\Column(type="text", nullable=true)
     */
    private $influences;

    /**
     * @var
     * @ORM\Column(type="text", nullable=true)
     */
    private $features;

    /**
     * @var
     * @ORM\Column(type="text", nullable=true)
     */
    private $materials;

    /**
     * @var
     * @ORM\Column(type="text", nullable=true)
     */
    private $decorations;

    /**
     * @var
     * @ORM\Column(type="text", nullable=true)
     */
    private $plants;

    /**
     * @return mixed
     */
    public function getMerch()
    {
        return $this->merch;
    }

    /**
     * @param mixed $merch
     */
    public function setMerch($merch)
    {
        $this->merch = $merch;
    }

    /**
     * @return mixed
     */
    public function getOrigins()
    {
        return $this->origins;
    }

    /**
     * @param mixed $origins
     */
    public function setOrigins($origins)
    {
        $this->origins = $origins;
    }

    /**
     * @return mixed
     */
    public function getInfluences()
    {
        return $this->influences;
    }

    /**
     * @param mixed $influences
     */
    public function setInfluences($influences)
    {
        $this->influences = $influences;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param mixed $subtitle
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return nl2br($this->description);
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return array
     */
    public function getFeatures()
    {
        return $this->features;
    }
    public function showFeaturesList()
    {
        if (!empty($this->features)) {
            return explode("\n", $this->features);
        } else {
            return false;
        }
    }

    /**
     * @param mixed $features
     */
    public function setFeatures($features)
    {
        $this->features = $features;
    }

    /**
     * @return array
     */
    public function getMaterials()
    {
        return $this->materials;
    }
    public function showMaterialsList()
    {
        if (!empty($this->materials)) {
            return explode("\n", $this->materials);
        } else {
            return false;
        }
    }

    /**
     * @param mixed $materials
     */
    public function setMaterials($materials)
    {
        $this->materials = $materials;
    }

    /**
     * @return array
     */
    public function getDecorations()
    {
        return $this->decorations;
    }
    public function showDecorationsList()
    {
        if (!empty($this->decorations)) {
            return explode("\n", $this->decorations);
        } else {
            return false;
        }
    }

    /**
     * @param mixed $decorations
     */
    public function setDecorations($decorations)
    {
        $this->decorations = $decorations;
    }

    /**
     * @return array
     */
    public function getPlants()
    {
        return $this->plants;
    }
    public function showPlantsList()
    {
        if (!empty($this->plants)) {
            return explode("\n", $this->plants);
        } else {
            return false;
        }
    }

    /**
     * @param mixed $plants
     */
    public function setPlants($plants)
    {
        $this->plants = $plants;
    }


}