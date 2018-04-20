<?php
/**
 * Created by PhpStorm.
 * User: Jof
 * Date: 1/27/2018
 * Time: 12:18 PM
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pricing")
 */
class Pricing
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $code;

    /**
     * @ORM\Column(type="string")
     */
    private $label;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $unit_label;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $unit_min;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $unit_max;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    private $price_3D;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    private $price_dossier_tech;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    private $price_choix_entreprise;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    private $price_guide_entretien;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $image;

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
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getUnitLabel()
    {
        return $this->unit_label;
    }

    /**
     * @param mixed $unit_label
     */
    public function setUnitLabel($unit_label)
    {
        $this->unit_label = $unit_label;
    }

    /**
     * @return mixed
     */
    public function getUnitMin()
    {
        return $this->unit_min;
    }

    /**
     * @param mixed $unit_min
     */
    public function setUnitMin($unit_min)
    {
        $this->unit_min = $unit_min;
    }

    /**
     * @return mixed
     */
    public function getUnitMax()
    {
        return $this->unit_max;
    }

    /**
     * @param mixed $unit_max
     */
    public function setUnitMax($unit_max)
    {
        $this->unit_max = $unit_max;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getPrice3D()
    {
        return $this->price_3D;
    }

    /**
     * @param mixed $price_3D
     */
    public function setPrice3D($price_3D)
    {
        $this->price_3D = $price_3D;
    }

    /**
     * @return mixed
     */
    public function getPriceDossierTech()
    {
        return $this->price_dossier_tech;
    }

    /**
     * @param mixed $price_dossier_tech
     */
    public function setPriceDossierTech($price_dossier_tech)
    {
        $this->price_dossier_tech = $price_dossier_tech;
    }

    /**
     * @return mixed
     */
    public function getPriceChoixEntreprise()
    {
        return $this->price_choix_entreprise;
    }

    /**
     * @param mixed $price_choix_entreprise
     */
    public function setPriceChoixEntreprise($price_choix_entreprise)
    {
        $this->price_choix_entreprise = $price_choix_entreprise;
    }

    /**
     * @return mixed
     */
    public function getPriceGuideEntretien()
    {
        return $this->price_guide_entretien;
    }

    /**
     * @param mixed $price_guide_entretien
     */
    public function setPriceGuideEntretien($price_guide_entretien)
    {
        $this->price_guide_entretien = $price_guide_entretien;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

}