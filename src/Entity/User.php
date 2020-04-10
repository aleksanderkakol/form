<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $lastName;


    /**
     * @ORM\Column(type="text")
     */
    private $exp;

    /**
     * @ORM\Column(type="text")
     */
    private $city;

    /**
     * @ORM\Column(type="text")
     */
    private $country;

    /**
     * @ORM\Column(type="boolean")
     */
    private $workRemote;

    /**
     * @ORM\Column(type="boolean")
     */
    private $workOnSite;

    /**
     * @ORM\Column(type="text")
     */
    private $occupation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getExp()
    {
        return $this->exp;
    }

    public function setExp($exp)
    {
        $this->exp = $exp;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getWorkRemote()
    {
        return $this->workRemote;
    }

    public function setWorkRemote($workRemote)
    {
        $this->workRemote = $workRemote;
    }

    public function getWorkOnSite()
    {
        return $this->workOnSite;
    }

    public function setWorkOnSite($workOnSite)
    {
        $this->workOnSite = $workOnSite;
    }

    public function getOccupation()
    {
        return $this->occupation;
    }

    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;
    }

}
