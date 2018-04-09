<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    private $content;
    private $user;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Post", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $post;
    private $creation_date;
    
    public function getId() {
        return $this->id;
    }
    public function getContent() {
        return $this->content;
    }
    public function getUser() {
        return $this->user;
       /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Post", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    }
    public function getPost() {
        return $this->post;
    }
    public function getCreation_date() {
        return $this->creation_date;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setContent($content) {
        $this->content = $content;
    }
    public function setUser($user) {
        $this->user = $user;
         /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Post", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    }
    public function setPost($post) {
        $this->post = $post;
    }
    public function setCreation_date($creation_date) {
        $this->creation_date = $creation_date;
    }
}