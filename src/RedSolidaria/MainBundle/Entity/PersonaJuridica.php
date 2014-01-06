<?php

namespace RedSolidaria\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonaJuridica
 *
 * @ORM\Table("personaJuridica")
 * @ORM\Entity(repositoryClass="RedSolidaria\MainBundle\Entity\PersonaJuridicaRepository")
 */
class PersonaJuridica extends Persona
{
    /**
     * @var string
     *
     * @ORM\Column(name="cuit", type="string", length=255)
     */
    private $cuit;

    /**
     * @var string
     *
     * @ORM\Column(name="razonSocial", type="string", length=255)
     */
    private $razonSocial;


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
     * Set cuit
     *
     * @param string $cuit
     * @return PersonaJuridica
     */
    public function setCuit($cuit)
    {
        $this->cuit = $cuit;

        return $this;
    }

    /**
     * Get cuit
     *
     * @return string 
     */
    public function getCuit()
    {
        return $this->cuit;
    }

    /**
     * Set razonSocial
     *
     * @param string $razonSocial
     * @return PersonaJuridica
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;

        return $this;
    }

    /**
     * Get razonSocial
     *
     * @return string 
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    public function eraseCredentials() {
        parent::eraseCredentials();
    }

    public function getRoles() {
        parent::getRoles();
    }

    public function serialize() {
        return serialize(array(
            $this->$personaJuridicaId,
            $this->cuit,
            $this->razonSocial,
        ));
    }

    public function unserialize($serialized) {
        list (
            $this->$personaJuridicaId,
            $this->cuit,
            $this->razonSocial,
        ) = unserialize($serialized);        
    }

}
