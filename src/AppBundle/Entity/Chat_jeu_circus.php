<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chat_jeu_circus
 *
 * @ORM\Table(name="chat_jeu_circus")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Chat_jeu_circusRepository")
 */
class Chat_jeu_circus
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
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $id_joueur;

    /**
     * @ORM\ManyToOne(targetEntity="Partie_circus")
     */
    private $id_partie;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     */
    private $message;


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
     * Set id_joueur
     *
     * @param integer $id_joueur
     *
     * @return Chat_jeu_circus
     */
    public function setId_joueur($id_joueur)
    {
        $this->idjoueur = $id_joueur;

        return $this;
    }

    /**
     * Get idjoueur
     *
     * @return int
     */
    public function getId_joueur()
    {
        return $this->id_joueur;
    }

    /**
     * Set id_partie
     *
     * @param integer $id_partie
     *
     * @return Chat_jeu_circus
     */
    public function setId_partie($id_partie)
    {
        $this->id_partie = $id_partie;

        return $this;
    }

    /**
     * Get id_partie
     *
     * @return int
     */
    public function getId_partie()
    {
        return $this->id_partie;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Chat_jeu_circus
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set idJoueur
     *
     * @param \AppBundle\Entity\User $idJoueur
     *
     * @return Chat_jeu_circus
     */
    public function setIdJoueur(\AppBundle\Entity\User $idJoueur = null)
    {
        $this->id_joueur = $idJoueur;

        return $this;
    }

    /**
     * Get idJoueur
     *
     * @return \AppBundle\Entity\User
     */
    public function getIdJoueur()
    {
        return $this->id_joueur;
    }

    /**
     * Set idPartie
     *
     * @param \AppBundle\Entity\Partie_circus $idPartie
     *
     * @return Chat_jeu_circus
     */
    public function setIdPartie(\AppBundle\Entity\Partie_circus $idPartie = null)
    {
        $this->id_partie = $idPartie;

        return $this;
    }

    /**
     * Get idPartie
     *
     * @return \AppBundle\Entity\Partie_circus
     */
    public function getIdPartie()
    {
        return $this->id_partie;
    }
}
