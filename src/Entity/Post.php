<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JsonSerializable;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class Post
 * @package App\Entity
 * @ORM\Table(name="post")
 * @ORM\HasLifecycleCallbacks()
 */
class Post implements JsonSerializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     * @var datetime
     */
    private $create_date;

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCreateDate(): ? \DateTime
    {
        return $this->create_date;
    }

    public function setCreateDate(\DateTime $create_date): self {
        $this->create_date = $create_date;
        return $this;
    }

    public function beforeSave() {
        try {
            $this->create_date = new \DateTime('now', new \DateTimeZone('Africa/Abidjan'));
        } catch (\Exception $e) {
        }
    }


    /**
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @since 5.4.0
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return [
            "name" => $this->getName(),
            "description" => $this->getDescription()
        ];
    }
}