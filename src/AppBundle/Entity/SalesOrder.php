<?php
/**
 * Created by PhpStorm.
 * User: Jof
 * Date: 4/22/2018
 * Time: 4:17 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sales_order")
 */
class SalesOrder
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
    private $mac;

    /**
     * @ORM\Column(type="string")
     */
    private $date;

    /**
     * @ORM\Column(type="string")
     */
    private $tpe;

    /**
     * @ORM\Column(type="string")
     */
    private $montant;

    /**
     * @ORM\Column(type="string")
     */
    private $reference;

    /**
     * @ORM\Column(type="string")
     */
    private $texteLibre;

    /**
     * @ORM\Column(type="string")
     */
    private $codeRetour;

    /**
     * @ORM\Column(type="string")
     */
    private $cvx;

    /**
     * @ORM\Column(type="string")
     */
    private $vld;

    /**
     * @ORM\Column(type="string")
     */
    private $brand;

    /**
     * @ORM\Column(type="string")
     */
    private $status3DS;

    /**
     * @ORM\Column(type="string")
     */
    private $numAuto;

    /**
     * @ORM\Column(type="string")
     */
    private $motifRefus;

    /**
     * @ORM\Column(type="string")
     */
    private $originicb;

    /**
     * @ORM\Column(type="string")
     */
    private $bincb;

    /**
     * @ORM\Column(type="string")
     */
    private $hpancb;

    /**
     * @ORM\Column(type="string")
     */
    private $ipclient;

    /**
     * @ORM\Column(type="string")
     */
    private $originetr;

    /**
     * @ORM\Column(type="string")
     */
    private $veres;

    /**
     * @ORM\Column(type="string")
     */
    private $pares;

    /**
     * @ORM\Column(type="string")
     */
    private $montantTech;

    /**
     * @ORM\Column(type="string")
     */
    private $filtrageCause;

    /**
     * @ORM\Column(type="string")
     */
    private $filtrageValeur;

    /**
     * @ORM\Column(type="string")
     */
    private $filtrageEtat;

    /**
     * @ORM\Column(type="string")
     */
    private $cbenregistree;

    /**
     * @ORM\Column(type="string")
     */
    private $cbmasquee;

    /**
     * @ORM\Column(type="string")
     */
    private $modepaiement;

    /**
     * @return mixed
     */
    public function getMac()
    {
        return $this->mac;
    }

    /**
     * @param mixed $mac
     */
    public function setMac($mac)
    {
        $this->mac = $mac;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getTpe()
    {
        return $this->tpe;
    }

    /**
     * @param mixed $tpe
     */
    public function setTpe($tpe)
    {
        $this->tpe = $tpe;
    }

    /**
     * @return mixed
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param mixed $montant
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return mixed
     */
    public function getTexteLibre()
    {
        return $this->texteLibre;
    }

    /**
     * @param mixed $texteLibre
     */
    public function setTexteLibre($texteLibre)
    {
        $this->texteLibre = $texteLibre;
    }

    /**
     * @return mixed
     */
    public function getCodeRetour()
    {
        return $this->codeRetour;
    }

    /**
     * @param mixed $codeRetour
     */
    public function setCodeRetour($codeRetour)
    {
        $this->codeRetour = $codeRetour;
    }

    /**
     * @return mixed
     */
    public function getCvx()
    {
        return $this->cvx;
    }

    /**
     * @param mixed $cvx
     */
    public function setCvx($cvx)
    {
        $this->cvx = $cvx;
    }

    /**
     * @return mixed
     */
    public function getVld()
    {
        return $this->vld;
    }

    /**
     * @param mixed $vld
     */
    public function setVld($vld)
    {
        $this->vld = $vld;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getStatus3DS()
    {
        return $this->status3DS;
    }

    /**
     * @param mixed $status3DS
     */
    public function setStatus3DS($status3DS)
    {
        $this->status3DS = $status3DS;
    }

    /**
     * @return mixed
     */
    public function getNumAuto()
    {
        return $this->numAuto;
    }

    /**
     * @param mixed $numAuto
     */
    public function setNumAuto($numAuto)
    {
        $this->numAuto = $numAuto;
    }

    /**
     * @return mixed
     */
    public function getMotifRefus()
    {
        return $this->motifRefus;
    }

    /**
     * @param mixed $motifRefus
     */
    public function setMotifRefus($motifRefus)
    {
        $this->motifRefus = $motifRefus;
    }

    /**
     * @return mixed
     */
    public function getOriginicb()
    {
        return $this->originicb;
    }

    /**
     * @param mixed $originicb
     */
    public function setOriginicb($originicb)
    {
        $this->originicb = $originicb;
    }

    /**
     * @return mixed
     */
    public function getBincb()
    {
        return $this->bincb;
    }

    /**
     * @param mixed $bincb
     */
    public function setBincb($bincb)
    {
        $this->bincb = $bincb;
    }

    /**
     * @return mixed
     */
    public function getHpancb()
    {
        return $this->hpancb;
    }

    /**
     * @param mixed $hpancb
     */
    public function setHpancb($hpancb)
    {
        $this->hpancb = $hpancb;
    }

    /**
     * @return mixed
     */
    public function getIpclient()
    {
        return $this->ipclient;
    }

    /**
     * @param mixed $ipclient
     */
    public function setIpclient($ipclient)
    {
        $this->ipclient = $ipclient;
    }

    /**
     * @return mixed
     */
    public function getOriginetr()
    {
        return $this->originetr;
    }

    /**
     * @param mixed $originetr
     */
    public function setOriginetr($originetr)
    {
        $this->originetr = $originetr;
    }

    /**
     * @return mixed
     */
    public function getVeres()
    {
        return $this->veres;
    }

    /**
     * @param mixed $veres
     */
    public function setVeres($veres)
    {
        $this->veres = $veres;
    }

    /**
     * @return mixed
     */
    public function getPares()
    {
        return $this->pares;
    }

    /**
     * @param mixed $pares
     */
    public function setPares($pares)
    {
        $this->pares = $pares;
    }

    /**
     * @return mixed
     */
    public function getMontantTech()
    {
        return $this->montantTech;
    }

    /**
     * @param mixed $montantTech
     */
    public function setMontantTech($montantTech)
    {
        $this->montantTech = $montantTech;
    }

    /**
     * @return mixed
     */
    public function getFiltrageCause()
    {
        return $this->filtrageCause;
    }

    /**
     * @param mixed $filtrageCause
     */
    public function setFiltrageCause($filtrageCause)
    {
        $this->filtrageCause = $filtrageCause;
    }

    /**
     * @return mixed
     */
    public function getFiltrageValeur()
    {
        return $this->filtrageValeur;
    }

    /**
     * @param mixed $filtrageValeur
     */
    public function setFiltrageValeur($filtrageValeur)
    {
        $this->filtrageValeur = $filtrageValeur;
    }

    /**
     * @return mixed
     */
    public function getFiltrageEtat()
    {
        return $this->filtrageEtat;
    }

    /**
     * @param mixed $filtrageEtat
     */
    public function setFiltrageEtat($filtrageEtat)
    {
        $this->filtrageEtat = $filtrageEtat;
    }

    /**
     * @return mixed
     */
    public function getCbenregistree()
    {
        return $this->cbenregistree;
    }

    /**
     * @param mixed $cbenregistree
     */
    public function setCbenregistree($cbenregistree)
    {
        $this->cbenregistree = $cbenregistree;
    }

    /**
     * @return mixed
     */
    public function getCbmasquee()
    {
        return $this->cbmasquee;
    }

    /**
     * @param mixed $cbmasquee
     */
    public function setCbmasquee($cbmasquee)
    {
        $this->cbmasquee = $cbmasquee;
    }

    /**
     * @return mixed
     */
    public function getModepaiement()
    {
        return $this->modepaiement;
    }

    /**
     * @param mixed $modepaiement
     */
    public function setModepaiement($modepaiement)
    {
        $this->modepaiement = $modepaiement;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}