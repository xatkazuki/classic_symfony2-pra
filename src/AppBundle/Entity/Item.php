<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints As Assert;

/**
 * Item
 *
 * @ORM\Table(name="item")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ItemRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Item
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text",nullable=true)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="discription_detail", type="text", nullable=true)
     */
    private $discriptionDetail;

    /**
     * @var string
     *
     * @ORM\Column(name="free_area", type="text", nullable=true)
     */
    private $freeArea;

    /**
     * @var integer
     *
     * @ORM\Column(name="del_flg", type="smallint", nullable=true)
     */
    private $delFlg;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_date", type="datetime", nullable=true)
     */
    private $createDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_date", type="datetime", nullable=true)
     */
    private $updateDate;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Item
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Item
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set discriptionDetail
     *
     * @param string $discriptionDetail
     *
     * @return Item
     */
    public function setDiscriptionDetail($discriptionDetail)
    {
        $this->discriptionDetail = $discriptionDetail;

        return $this;
    }

    /**
     * Get discriptionDetail
     *
     * @return string
     */
    public function getDiscriptionDetail()
    {
        return $this->discriptionDetail;
    }

    /**
     * Set freeArea
     *
     * @param string $freeArea
     *
     * @return Item
     */
    public function setFreeArea($freeArea)
    {
        $this->freeArea = $freeArea;

        return $this;
    }

    /**
     * Get freeArea
     *
     * @return string
     */
    public function getFreeArea()
    {
        return $this->freeArea;
    }

    /**
     * Set delFlg
     *
     * @param integer $delFlg
     *
     * @return Item
     */
    public function setDelFlg($delFlg)
    {
        $this->delFlg = $delFlg;

        return $this;
    }

    /**
     * Get delFlg
     *
     * @return integer
     */
    public function getDelFlg()
    {
        return $this->delFlg;
    }

    /**
     * Set createDate
     *
     * @param \DateTime $createDate
     *
     * @return Item
     */
    public function setCreateDate($createDate)
    {
        //$createDate = date("Y/m/d");

        $this->createDate = $createDate;

        return $this;
    }

    /**
     * Get createDate
     *
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set updateDate
     *
     * @param \DateTime $updateDate
     *
     * @return Item
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    /**
     * Get updateDate
     *
     * @return \DateTime
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }
}
