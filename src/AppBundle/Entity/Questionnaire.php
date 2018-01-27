<?php
/**
 * Created by PhpStorm.
 * User: Jof
 * Date: 1/27/2018
 * Time: 12:37 PM
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="questionnaire")
 */
class Questionnaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $type;

    /**
     * @ORM\Column(type="string")
     */
    private $option3D;

    /**
     * @ORM\Column(type="string")
     */
    private $style;

    /**
     * @ORM\Column(type="string")
     */
    private $wishes;

    /**
     * @ORM\Column(type="string")
     */
    private $structure;

    /**
     * @ORM\Column(type="string")
     */
    private $structureComments;

    /**
     * @ORM\Column(type="string")
     */
    private $usage;

    /**
     * @ORM\Column(type="string")
     */
    private $nbResident;

    /**
     * @ORM\Column(type="string")
     */
    private $elements;

    /**
     * @ORM\Column(type="string")
     */
    private $elementsComments;

    /**
     * @ORM\Column(type="string")
     */
    private $budget;

    /**
     * @ORM\Column(type="string")
     */
    private $workMyself;

    /**
     * @ORM\Column(type="string")
     */
    private $workMyselfOption;

    /**
     * @ORM\Column(type="string")
     */
    private $workPro;

    /**
     * @ORM\Column(type="string")
     */
    private $workProOption;

    /**
     * @ORM\Column(type="string")
     */
    private $watering;

    /**
     * @ORM\Column(type="string")
     */
    private $upkeep;

    /**
     * @ORM\Column(type="string")
     */
    private $upkeepOption;

    /**
     * @ORM\Column(type="string")
     */
    private $user;

    /**
     * @ORM\Column(type="string")
     */
    private $moveNear;

    /**
     * @ORM\Column(type="string")
     */
    private $moveFar;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
    public function getOption3D()
    {
        return $this->option3D;
    }

    /**
     * @param mixed $option3D
     */
    public function setOption3D($option3D)
    {
        $this->option3D = $option3D;
    }

    /**
     * @return mixed
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * @param mixed $style
     */
    public function setStyle($style)
    {
        $this->style = $style;
    }

    /**
     * @return mixed
     */
    public function getWishes()
    {
        return $this->wishes;
    }

    /**
     * @param mixed $wishes
     */
    public function setWishes($wishes)
    {
        $this->wishes = $wishes;
    }

    /**
     * @return mixed
     */
    public function getStructure()
    {
        return $this->structure;
    }

    /**
     * @param mixed $structure
     */
    public function setStructure($structure)
    {
        $this->structure = $structure;
    }

    /**
     * @return mixed
     */
    public function getStructureComments()
    {
        return $this->structureComments;
    }

    /**
     * @param mixed $structureComments
     */
    public function setStructureComments($structureComments)
    {
        $this->structureComments = $structureComments;
    }

    /**
     * @return mixed
     */
    public function getUsage()
    {
        return $this->usage;
    }

    /**
     * @param mixed $usage
     */
    public function setUsage($usage)
    {
        $this->usage = $usage;
    }

    /**
     * @return mixed
     */
    public function getNbResident()
    {
        return $this->nbResident;
    }

    /**
     * @param mixed $nbResident
     */
    public function setNbResident($nbResident)
    {
        $this->nbResident = $nbResident;
    }

    /**
     * @return mixed
     */
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * @param mixed $elements
     */
    public function setElements($elements)
    {
        $this->elements = $elements;
    }

    /**
     * @return mixed
     */
    public function getElementsComments()
    {
        return $this->elementsComments;
    }

    /**
     * @param mixed $elementsComments
     */
    public function setElementsComments($elementsComments)
    {
        $this->elementsComments = $elementsComments;
    }

    /**
     * @return mixed
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * @param mixed $budget
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;
    }

    /**
     * @return mixed
     */
    public function getWorkMyself()
    {
        return $this->workMyself;
    }

    /**
     * @param mixed $workMyself
     */
    public function setWorkMyself($workMyself)
    {
        $this->workMyself = $workMyself;
    }

    /**
     * @return mixed
     */
    public function getWorkMyselfOption()
    {
        return $this->workMyselfOption;
    }

    /**
     * @param mixed $workMyselfOption
     */
    public function setWorkMyselfOption($workMyselfOption)
    {
        $this->workMyselfOption = $workMyselfOption;
    }

    /**
     * @return mixed
     */
    public function getWorkPro()
    {
        return $this->workPro;
    }

    /**
     * @param mixed $workPro
     */
    public function setWorkPro($workPro)
    {
        $this->workPro = $workPro;
    }

    /**
     * @return mixed
     */
    public function getWorkProOption()
    {
        return $this->workProOption;
    }

    /**
     * @param mixed $workProOption
     */
    public function setWorkProOption($workProOption)
    {
        $this->workProOption = $workProOption;
    }

    /**
     * @return mixed
     */
    public function getWatering()
    {
        return $this->watering;
    }

    /**
     * @param mixed $watering
     */
    public function setWatering($watering)
    {
        $this->watering = $watering;
    }

    /**
     * @return mixed
     */
    public function getUpkeep()
    {
        return $this->upkeep;
    }

    /**
     * @param mixed $upkeep
     */
    public function setUpkeep($upkeep)
    {
        $this->upkeep = $upkeep;
    }

    /**
     * @return mixed
     */
    public function getUpkeepOption()
    {
        return $this->upkeepOption;
    }

    /**
     * @param mixed $upkeepOption
     */
    public function setUpkeepOption($upkeepOption)
    {
        $this->upkeepOption = $upkeepOption;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getMoveNear()
    {
        return $this->moveNear;
    }

    /**
     * @param mixed $moveNear
     */
    public function setMoveNear($moveNear)
    {
        $this->moveNear = $moveNear;
    }

    /**
     * @return mixed
     */
    public function getMoveFar()
    {
        return $this->moveFar;
    }

    /**
     * @param mixed $moveFar
     */
    public function setMoveFar($moveFar)
    {
        $this->moveFar = $moveFar;
    }

}