<?php

namespace Backend\ProductoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Backend\ProductoBundle\Entity\Caracteristica
 *
 * @ORM\Table("caracteristica")
 * @ORM\Entity(repositoryClass="Backend\ProductoBundle\Entity\CaracteristicaRepository")
 */
class Caracteristica
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
     * @var string $tipo
     *
     * @ORM\Column(name="tipo", type="string", length=100)
     */
    private $tipo;

    /**
     * @var type $productos
     * 
     * @ORM\ManyToOne(targetEntity="Producto", inversedBy="caracteristicas", cascade={"all"})
     * @ORM\JoinColumn(name="producto_id", referencedColumnName="id")
     * 
     */
    
    private $producto;

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
     * Set tipo
     *
     * @param string $tipo
     * @return Caracteristica
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set producto
     *
     * @param Backend\ProductoBundle\Entity\Producto $producto
     * @return Caracteristica
     */
    public function setProducto(\Backend\ProductoBundle\Entity\Producto $producto = null)
    {
        $this->producto = $producto;
    
        return $this;
    }

    /**
     * Get producto
     *
     * @return Backend\ProductoBundle\Entity\Producto 
     */
    public function getProducto()
    {
        return $this->producto;
    }
}