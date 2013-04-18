<?php

namespace Backend\ProductoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Backend\ProductoBundle\Entity\Categoria
 *
 * @ORM\Table("categoria")
 * @ORM\Entity
 */
class Categoria
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
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;

    /**
     *
     * @var type $producto
     * @ORM\OneToMany(targetEntity="Producto", mappedBy="categoria", cascade={"persist"})
     * 
     */
    private $productos;
    
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
     * @return Categoria
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
     * Constructor
     */
    public function __construct()
    {
        $this->productos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add productos
     *
     * @param Backend\ProductoBundle\Entity\Producto $productos
     * @return Categoria
     */
    public function addProducto(\Backend\ProductoBundle\Entity\Producto $productos)
    {
        $this->productos[] = $productos;
    
        return $this;
    }

    /**
     * Remove productos
     *
     * @param Backend\ProductoBundle\Entity\Producto $productos
     */
    public function removeProducto(\Backend\ProductoBundle\Entity\Producto $productos)
    {
        $this->productos->removeElement($productos);
    }

    /**
     * Get productos
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getProductos()
    {
        return $this->productos;
    }
}