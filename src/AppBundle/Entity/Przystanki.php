<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Przystanki
 *
 * @ORM\Table(name="przystanki")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PrzystankiRepository")
 */
class Przystanki
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="adresPrzystanku", type="string", length=255)
     */
    private $adresPrzystanku;

    /**
     * @var string
     *
     * @ORM\Column(name="opis", type="string", length=500)
     */
    private $opis;

    /**
     * @var int
     *
     * @ORM\Column(name="identyfikator", type="integer")
     */
    private $identyfikator;

    /**
     * @var string
     *
     * @ORM\Column(name="zal1", type="string", length=255)
     */
    private $zal1;

    /**
     * @var string
     *
     * @ORM\Column(name="zal2", type="string", length=255)
     */
    private $zal2;

    /**
     * @var string
     *
     * @ORM\Column(name="zal3", type="string", length=255)
     */
    private $zal3;

    /**
     * @var int
     *
     * @ORM\Column(name="odczytano", type="integer")
     */
    private $odczytano;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set adresPrzystanku
     *
     * @param string $adresPrzystanku
     *
     * @return Przystanki
     */
    public function setAdresPrzystanku($adresPrzystanku)
    {
        $this->adresPrzystanku = $adresPrzystanku;

        return $this;
    }

    /**
     * Get adresPrzystanku
     *
     * @return string
     */
    public function getAdresPrzystanku()
    {
        return $this->adresPrzystanku;
    }

    /**
     * Set opis
     *
     * @param string $opis
     *
     * @return Przystanki
     */
    public function setOpis($opis)
    {
        $this->opis = $opis;

        return $this;
    }

    /**
     * Get opis
     *
     * @return string
     */
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * Set identyfikator
     *
     * @param integer $identyfikator
     *
     * @return Przystanki
     */
    public function setIdentyfikator($identyfikator)
    {
        $this->identyfikator = $identyfikator;

        return $this;
    }

    /**
     * Get identyfikator
     *
     * @return int
     */
    public function getIdentyfikator()
    {
        return $this->identyfikator;
    }

    /**
     * Set zal1
     *
     * @param string $zal1
     *
     * @return Przystanki
     */
    public function setZal1($zal1)
    {
        $this->zal1 = $zal1;

        return $this;
    }

    /**
     * Get zal1
     *
     * @return string
     */
    public function getZal1()
    {
        return $this->zal1;
    }

    /**
     * Set zal2
     *
     * @param string $zal2
     *
     * @return Przystanki
     */
    public function setZal2($zal2)
    {
        $this->zal2 = $zal2;

        return $this;
    }

    /**
     * Get zal2
     *
     * @return string
     */
    public function getZal2()
    {
        return $this->zal2;
    }

    /**
     * Set zal3
     *
     * @param string $zal3
     *
     * @return Przystanki
     */
    public function setZal3($zal3)
    {
        $this->zal3 = $zal3;

        return $this;
    }

    /**
     * Get zal3
     *
     * @return string
     */
    public function getZal3()
    {
        return $this->zal3;
    }

    /**
     * Set odczytano
     *
     * @param integer $odczytano
     *
     * @return Przystanki
     */
    public function setOdczytano($odczytano)
    {
        $this->odczytano = $odczytano;

        return $this;
    }

    /**
     * Get odczytano
     *
     * @return int
     */
    public function getOdczytano()
    {
        return $this->odczytano;
    }
}

