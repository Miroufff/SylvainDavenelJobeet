<?php
/**
 * Created by PhpStorm.
 * User: mirouf
 * Date: 19/05/16
 * Time: 16:29
 */

namespace Ens\SylvainDavenelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Affiliate
 *
 * @ORM\Entity
 * @ORM\Table(name="t_affiliate")
 * @ORM\HasLifecycleCallbacks()
 * @package Ens\SylvainDavenelBundle\Entity
 */
class Affiliate
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
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255)
     */
    private $token;

    /**
     * @var datetime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var mixed
     *
     * @ORM\OneToMany(targetEntity="CategoryAffiliate", mappedBy="affiliate")
     */
    private $categoryAffiliates;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdAt
     *
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        if(!$this->getCreatedAt())
        {
            $this->createdAt = new \DateTime();
        }
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getCategoryAffiliates()
    {
        return $this->categoryAffiliates;
    }

    /**
     * @param mixed $categoryAffiliates
     */
    public function setCategoryAffiliates($categoryAffiliates)
    {
        $this->categoryAffiliates = $categoryAffiliates;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categoryAffiliates = new ArrayCollection();
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Affiliate
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Add categoryAffiliate
     *
     * @param CategoryAffiliate $categoryAffiliate
     *
     * @return Affiliate
     */
    public function addCategoryAffiliate(CategoryAffiliate $categoryAffiliate)
    {
        $this->categoryAffiliates[] = $categoryAffiliate;

        return $this;
    }

    /**
     * Remove categoryAffiliate
     *
     * @param CategoryAffiliate $categoryAffiliate
     */
    public function removeCategoryAffiliate(CategoryAffiliate $categoryAffiliate)
    {
        $this->categoryAffiliates->removeElement($categoryAffiliate);
    }
}
