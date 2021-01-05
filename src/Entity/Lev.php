<?php

namespace App\Entity;

use App\Repository\LevRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LevRepository::class)
 */
class Lev
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $name;
    
    /**
     * @ORM\Column(type="text")
     */
    private $type;
    
    /**
    * @ORM\Column(type="integer")
    */
    private $year;
    
    /**
     * @ORM\Column(type="text")
     */
    private $country;
    
    /**
     * @ORM\Column(type="text")
     */
    private $image;
    
    
    public function getID() {
        return $this->id;
    }

    public function getname() {
        return $this->name;
    }  
    public function setname($name) {
        $this->name = $name;
    }
    
    public function gettype() {
        return $this->type;
    }  
    public function settype($type) {
        $this->type = $type;
    }
    
    public function getyear() {
        return $this->year;
    }  
    public function setyear($year) {
        $this->year = $year;
    }
    
    public function getcountry() {
        return $this->country;
    }  
    public function setcountry($country) {
        $this->country = $country;
    }
    
    public function getimage() {
        return $this->image;
    }  
    public function setimage($image) {
        $this->image = $image;
    }
    
}
