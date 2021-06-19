<?php


namespace src;
require_once "bootstrap.php";

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="todo")
 */
class Todo
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     */
    protected $text;

    public function getId()
    {
        return $this->id;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public static function createMultipleTodosFromArray($decodedContents, EntityManager $em)
    {
        foreach ($decodedContents as $line) {

            $todo = $em->getRepository('src\Todo')->findBy(['text' => $line->title]);
            if(!$todo){
                $todo = new Todo();
                $todo->setText($line->title);
                $em->persist($todo);
                $em->flush();
            }

        }
    }
}