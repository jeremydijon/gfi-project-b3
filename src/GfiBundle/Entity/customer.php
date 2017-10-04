<?php

namespace GfiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="GfiBundle\Repository\CustomerRepository")
 */
class Customer
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="CustomerCard", mappedBy="idCustomer")
     */
    private $customerCards;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    /**
     * @ORM\OneToMany(targetEntity="ContactCustomer", mappedBy="contacts")
     */
    private $contactCustomer;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->customerCards = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Customer
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
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Customer
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Add customerCard
     *
     * @param \GfiBundle\Entity\CustomerCard $customerCard
     *
     * @return Customer
     */
    public function addCustomerCard(\GfiBundle\Entity\CustomerCard $customerCard)
    {
        $this->customerCards[] = $customerCard;

        return $this;
    }

    /**
     * Remove customerCard
     *
     * @param \GfiBundle\Entity\CustomerCard $customerCard
     */
    public function removeCustomerCard(\GfiBundle\Entity\CustomerCard $customerCard)
    {
        $this->customerCards->removeElement($customerCard);
    }

    /**
     * Get customerCards
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCustomerCards()
    {
        return $this->customerCards;
    }
}
