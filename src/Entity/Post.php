<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use DateTime;

class Post {
    
    private $id;
    private $title;
    private $content;
    private $creationDate;
    private $author;
    private $comments;
    private $tags;
    
    public function __construct() {
        $this->comments = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }
    
    public function getTags() {
        return $this->tags;
    }
    
    public function getComments() {
        return $this->comments;
    }
    
    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }
    public function getContent() {
        return $this->content;
    }
    public function getCreationDate(): DateTime {
        return $this->creationDate;
    }
    public function getAuthor(): User {
        return $this->author;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function setContent($content) {
        $this->content = $content;
    }
    public function setCreationDate(DateTime $creationDate) {
        $this->creationDate = $creationDate;
    }
    public function setAuthor(User $author) {
        $this->author = $author;
    }
    
}