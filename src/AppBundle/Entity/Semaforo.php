<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Semaforo
 *
 * @ORM\Table(name="semaforo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SemaforoRepository")
 */
class Semaforo
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
     * @ORM\Column(name="callePrimaria", type="string", length=255)
     */
    private $callePrimaria;

    /**
     * @var string
     *
     * @ORM\Column(name="calleSecundaria", type="string", length=255)
     */
    private $calleSecundaria;

    /**
     * @var int
     *
     * @ORM\Column(name="autosPorMinuto", type="integer")
     */
    private $autosPorMinuto;

    /**
     * @var int
     *
     * @ORM\Column(name="frecuencia", type="integer")
     */
    private $frecuencia;



    public function __construct(){
        $this->autosPorMinuto=0;
        $this->frecuencia=0;
    }

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
     * Set callePrimaria
     *
     * @param string $callePrimaria
     *
     * @return Semaforo
     */
    public function setCallePrimaria($callePrimaria)
    {
        $this->callePrimaria = $callePrimaria;

        return $this;
    }

    /**
     * Get callePrimaria
     *
     * @return string
     */
    public function getCallePrimaria()
    {
        return $this->callePrimaria;
    }

    /**
     * Set calleSecundaria
     *
     * @param string $calleSecundaria
     *
     * @return Semaforo
     */
    public function setCalleSecundaria($calleSecundaria)
    {
        $this->calleSecundaria = $calleSecundaria;

        return $this;
    }

    /**
     * Get calleSecundaria
     *
     * @return string
     */
    public function getCalleSecundaria()
    {
        return $this->calleSecundaria;
    }

    /**
     * Set autosPorMinuto
     *
     * @param integer $autosPorMinuto
     *
     * @return Semaforo
     */
    public function setAutosPorMinuto($autosPorMinuto)
    {
        $this->autosPorMinuto = $autosPorMinuto;

        return $this;
    }

    /**
     * Get autosPorMinuto
     *
     * @return int
     */
    public function getAutosPorMinuto()
    {
        return $this->autosPorMinuto;
    }

    /**
     * Set frecuencia
     *
     * @param integer $frecuencia
     *
     * @return Semaforo
     */
    public function setFrecuencia($frecuencia)
    {
        $this->frecuencia = $frecuencia;

        return $this;
    }

    /**
     * Get frecuencia
     *
     * @return int
     */
    public function getFrecuencia()
    {
        return $this->frecuencia;
    }

     /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        $baseURL="http://localhost/SemaphoreSimulator/web/semaforo/json/";
        return $baseURL.$this->id;
    }

}

