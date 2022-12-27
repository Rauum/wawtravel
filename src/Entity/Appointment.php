<?php

namespace App\Entity;

class Appointment {

  private ?int $id;
  private ?string $title;
  private ?string $details;
  private ?string $start_at;
  private ?int $important;

  public function getId(): ?int {
    return $this->id;
  }

  public function getTitle(): ?string {
    return $this->title;
  }
  public function setTitle(?string $title) {
    $this->title = $title;
  }

  public function getDetails(): ?string {
    return $this->details;
  }
  public function setDetails(?string $details) {
    $this->details = $details;
  }

  public function getStartAt(): ?string {
    return $this->start_at;
  }
  public function setStartAt(?string $start_at) {
    $this->start_at = $start_at;
  }

  public function getImportant(): ?int {
    return $this->important;
  }
  public function setImportant(?int $important) {
    $this->important = $important;
  }

  public function displayDate() {
    $tmp = new \Datetime($this->start_at);
    return '<i class="fa-regular fa-calendar-check"></i> ' . $tmp->format('d/m/Y');
  }

  public function displayTime() {
    $tmp = new \Datetime($this->start_at);
    return '<i class="fa-regular fa-clock"></i> ' . $tmp->format('h:i') . ' h';
  }

}