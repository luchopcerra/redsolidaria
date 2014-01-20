<?php

namespace RedSolidaria\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonaFisica
 * @ORM\Entity(repositoryClass="RedSolidaria\MainBundle\Entity\PersonaFisicaRepository")
 */
class PersonaFisica extends Persona
{
    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=15)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="nombres", type="string", length=255)
     */
    private $nombres;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=255)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="cuil", type="string", length=15)
     */
    private $cuil;
    
    function __construct($username, $password, $email, $direccion, $dni, $nombres, $apellidos, $cuil) {
        
        parent::__construct($username,$password);

        $this->email = $email;
        $this->direccion = $direccion;
        $this->dni = $dni;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->cuil = $cuil;
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return parent::getId();
    }

    /**
     * Set dni
     *
     * @param string $dni
     * @return PersonaFisica
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string 
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     * @return PersonaFisica
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Get nombres
     *
     * @return string 
     */
    public function getNombres()
    {
        return $this->nombres;
    }
    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return PersonaFisica
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set cuil
     *
     * @param string $cuil
     * @return PersonaFisica
     */
    public function setCuil($cuil)
    {
        $this->cuil = $cuil;

        return $this;
    }

    /**
     * Get cuil
     *
     * @return string 
     */
    public function getCuil()
    {
        return $this->cuil;
    }

    public function eraseCredentials() {
        parent::eraseCredentials();
    }

    public function getRoles() {
        return array('ROLE_ADMIN');
//        return parent::getRoles();
    }

    public function serialize() {
        //el id lo obtengo afuera del serialize porque no se permite la llamada a metodos o funciones
        //adentro de esa llamada del serialize 
        $id = parent::getId();

        return serialize(array(
            $this->apellidos,
            $this->cuil,
            $this->dni,
            $id,
            $this->nombres,
        ));
    }

    public function unserialize($serialized) {
        //el id lo obtengo afuera del list porque no se permite la llamada a metodos o funciones
        //adentro de esa llamada del list
        $id = parent::getId();
        
        list (
            $this->apellidos,
            $this->cuil,
            $this->dni,
            $id,
            $this->nombres,
        ) = unserialize($serialized);
    }

}
