<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joueur_circus
 *
 * @ORM\Table(name="joueur_circus")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Joueur_circusRepository")
 */
class Joueur_circus
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
