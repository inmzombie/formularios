<?php

namespace Backend\ProductoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Backend\ProductoBundle\Entity\Producto
 *
 * @ORM\Table("producto")
 * @ORM\Entity(repositoryClass="Backend\ProductoBundle\Entity\ProductoRepository")
 */
class Producto
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var float $precio
     *
     * @ORM\Column(name="precio", type="float")
     */
    private $precio;

    /**
     * @var string $descripcion
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;
    
    /**
     * @var type 
     * 
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="productos", cascade={"all"})
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     */
    private $categoria;
    
    /**
     * @var type 
     * @ORM\OneToMany(targetEntity="Caracteristica", mappedBy="producto", cascade={"persist"})     * 
     */
    private $caracteristicas;
    
    public function __toString() {
        return $this->nombre;
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
     * Set nombre
     *
     * @param string $nombre
     * @return Producto
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
     * Set precio
     *
     * @param float $precio
     * @return Producto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    
        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Producto
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
     * Set categoria
     *
     * @param Backend\ProductoBundle\Entity\Categoria $categoria
     * @return Producto
     */
    public function setCategoria(\Backend\ProductoBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;
    
        return $this;
    }

    /**
     * Get categoria
     *
     * @return Backend\ProductoBundle\Entity\Categoria 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->caracteristicas = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add caracteristicas
     *
     * @param Backend\ProductoBundle\Entity\Caracteristica $caracteristicas
     * @return Producto
     */
    public function addCaracteristica(\Backend\ProductoBundle\Entity\Caracteristica $caracteristicas)
    {
        $caracteristicas->setProducto($this);
        $this->caracteristicas[] = $caracteristicas;
    
        return $this;
    }

    /**
     * Remove caracteristicas
     *
     * @param Backend\ProductoBundle\Entity\Caracteristica $caracteristicas
     */
    public function removeCaracteristica(\Backend\ProductoBundle\Entity\Caracteristica $caracteristicas)
    {
        $this->caracteristicas->removeElement($caracteristicas);
    }

    /**
     * Get caracteristicas
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCaracteristicas()
    {
        return $this->caracteristicas;
    }
}