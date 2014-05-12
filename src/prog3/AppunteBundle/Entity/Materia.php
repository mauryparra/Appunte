<?php

namespace prog3\AppunteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Materia
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Materia
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
     * @ORM\Column(name="Nombre", type="string", length=100)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="Carrera_id", type="integer")
     */
    private $carreraId;


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
     * @return Materia
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
     * Set carreraId
     *
     * @param integer $carreraId
     * @return Materias
     */
    public function setCarreraId($carreraId)
    {
        $this->carreraId = $carreraId;

        return $this;
    }

    /**
     * Get carreraId
     *
     * @return integer 
     */
    public function getCarreraId()
    {
        return $this->carreraId;
    }




    ### RELACIONES

    /**
     * @ORM\OneToMany(targetEntity="Apunte", mappedBy="materia")
     */
    protected $apunte;


    public function __construct()
    {
        $this->apunte = new ArrayCollection();
    }

    public function getApunte()
    {
        return $this->apunte;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Carrera", inversedBy="materia")
     * @ORM\JoinColumn(name="Carrera_id", referencedColumnName="id")
     */
    protected $carrera;

    public function getCarrera()
    {
        return $this->carrera;
    }
}
