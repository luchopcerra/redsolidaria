<?php

namespace RedSolidaria\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;
use DateTime;

/**
 * Publicacion
 *
 * @ORM\Table("publicacion")
 * @ORM\Entity(repositoryClass="RedSolidaria\MainBundle\Entity\PublicacionRepository")
 */
class Publicacion
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
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Persona", cascade={"persist"})
     * @ORM\JoinColumn(name="autorPersonaId", referencedColumnName="id")
     * 
     */
    private $autor;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activa", type="boolean")
     */
    private $activa;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaInicio", type="date")
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaFin", type="date")
     */
    private $fechaFin;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="string", length=255)
     */
    private $ubicacion;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Persona", cascade={"persist"})
     * @ORM\JoinColumn(name="ganadorPersonaId", referencedColumnName="id")
     */
    private $ganador;

    /**
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="Tag", cascade={"persist"})
     * @ORM\JoinTable(name="publicacionTags",
     *      joinColumns        ={@ORM\JoinColumn(name="publicacionId", referencedColumnName="id")},
     *      inverseJoinColumns ={@ORM\JoinColumn(name="tagId",         referencedColumnName="id", unique=true)}
     * )
     */
    private $tags;
    
    function __construct($autor, $titulo, $descripcion, $activa, $fechaInicio, $fechaFin, $ubicacion, $tags) {
        $this->autor = $autor;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->activa = $activa;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
        $this->ubicacion = $ubicacion;
        $this->tags = $tags;
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
     * Set autor
     *
     * @param \stdClass $autor
     * @return Publicacion
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return \stdClass 
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Publicacion
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Publicacion
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
     * Set activa
     *
     * @param boolean $activa
     * @return Publicacion
     */
    public function setActiva($activa)
    {
        $this->activa = $activa;

        return $this;
    }

    /**
     * Get activa
     *
     * @return boolean 
     */
    public function getActiva()
    {
        return $this->activa;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Publicacion
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return Publicacion
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime 
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set ubicacion
     *
     * @param string $ubicacion
     * @return Publicacion
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return string 
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set ganador
     *
     * @param \stdClass $ganador
     * @return Publicacion
     */
    public function setGanador($ganador)
    {
        $this->ganador = $ganador;

        return $this;
    }

    /**
     * Get ganador
     *
     * @return \stdClass 
     */
    public function getGanador()
    {
        return $this->ganador;
    }

    /**
     * Set tags
     *
     * @param array $tags
     * @return Publicacion
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return array 
     */
    public function getTags()
    {
        return $this->tags;
    }
}
