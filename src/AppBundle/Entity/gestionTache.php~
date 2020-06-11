<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GestionTache
 *
 * @ORM\Table(name="gestion_tache")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GestionTacheRepository")
 */
class GestionTache
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="temps", type="time")
     */
    private $temps;

    /**
     * @var string
     *
     * @ORM\Column(name="tacheAutre", type="text",nullable=true)
     */
    private $tacheAutre;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TacheAdmin")
     */
    private $tacheAdmin;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TacheAlg")
     */
    private $tacheAlg;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TachePilote")
     */
    private $tachePilote;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", cascade={"persist"})
     */
    private $user;


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return GestionTache
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set temps
     *
     * @param \DateTime $temps
     *
     * @return GestionTache
     */
    public function setTemps($temps)
    {
        $this->temps = $temps;

        return $this;
    }

    /**
     * Get temps
     *
     * @return \DateTime
     */
    public function getTemps()
    {
        return $this->temps;
    }

    /**
     * Set tacheAutre
     *
     * @param string $tacheAutre
     *
     * @return GestionTache
     */
    public function setTacheAutre($tacheAutre)
    {
        $this->tacheAutre = $tacheAutre;

        return $this;
    }

    /**
     * Get tacheAutre
     *
     * @return string
     */
    public function getTacheAutre()
    {
        return $this->tacheAutre;
    }

    /**
     * Set tacheAdmin
     *
     * @param \AppBundle\Entity\tacheAdmin $tacheAdmin
     *
     * @return GestionTache
     */
    public function setTacheAdmin(\AppBundle\Entity\tacheAdmin $tacheAdmin = null)
    {
        $this->tacheAdmin = $tacheAdmin;

        return $this;
    }

    /**
     * Get tacheAdmin
     *
     * @return \AppBundle\Entity\tacheAdmin
     */
    public function getTacheAdmin()
    {
        return $this->tacheAdmin;
    }

    /**
     * Set tacheAlg
     *
     * @param \AppBundle\Entity\tacheAlg $tacheAlg
     *
     * @return GestionTache
     */
    public function setTacheAlg(\AppBundle\Entity\tacheAlg $tacheAlg = null)
    {
        $this->tacheAlg = $tacheAlg;

        return $this;
    }

    /**
     * Get tacheAlg
     *
     * @return \AppBundle\Entity\tacheAlg
     */
    public function getTacheAlg()
    {
        return $this->tacheAlg;
    }

    /**
     * Set tachePilote
     *
     * @param \AppBundle\Entity\tachePilote $tachePilote
     *
     * @return GestionTache
     */
    public function setTachePilote(\AppBundle\Entity\tachePilote $tachePilote = null)
    {
        $this->tachePilote = $tachePilote;

        return $this;
    }

    /**
     * Get tachePilote
     *
     * @return \AppBundle\Entity\tachePilote
     */
    public function getTachePilote()
    {
        return $this->tachePilote;
    }



    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return GestionTache
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
