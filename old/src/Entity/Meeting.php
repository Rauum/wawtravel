<?php

namespace App\Entity;

class Meeting {

    private ?int $id;
    private ?string $title;
    private ?string $details;
    private ?string $date;
    private ?int $important;


    //Set id
    public function getId(): ?int{
        return $this->id;
    }

    //Get & Set title
    public function getTitle(): ?string{
        return $this->title;
    }
    public function setTitle(?string $title): void{
        $this->title = $title;
    }

    //Get & Set details
    public function getDetails(): ?string{
        return $this->details;
    }
    public function setDetails(?string $details): void{
        $this->details = $details;
    }

    //Get & Set date
    public function getDate(): ?string{
        return $this->date;
    }
    public function setDate(?string $date): void{
        $this->date = $date;
    }

    //Get & Set important
    public function getImportant(): ?int{
        return $this->important;
    }
    public function setImportant(?int $important): void{
        $this->important = $important;
    }

}