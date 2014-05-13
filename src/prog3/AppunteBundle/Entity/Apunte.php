<?php

namespace prog3\AppunteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Apuntes
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Apunte
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
     * @ORM\Column(name="Nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Fecha", type="date")
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="Materia_id", type="integer")
     */
    private $materiaId;

    /**
     * @var integer
     *
     * @ORM\Column(name="Usuario_id", type="integer")
     */
    private $usuarioId;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Apunte
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Apunte
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Apunte
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set materiaId
     *
     * @param integer $materiaId
     * @return Apunte
     */
    public function setMateriaId($materiaId)
    {
        $this->materiaId = $materiaId;

        return $this;
    }

    /**
     * Get materiaId
     *
     * @return integer 
     */
    public function getMateriaId()
    {
        return $this->materiaId;
    }

    /**
     * Set usuarioId
     *
     * @param integer $usuarioId
     * @return Apunte
     */
    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;

        return $this;
    }

    /**
     * Get usuarioId
     *
     * @return integer 
     */
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }




    ### RELACIONES

    /**
     * @ORM\ManyToOne(targetEntity="Materia", inversedBy="apunte")
     * @ORM\JoinColumn(name="Materia_id", referencedColumnName="id")
     */
    protected $materia;

    public function getMateria()
    {
        return $this->materia;
    }


    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="apunte")
     * @ORM\JoinColumn(name="Usuario_id", referencedColumnName="id")
     */
    protected $usuario;

    public function getUsuario()
    {
        return $this->usuario;
    }

}
