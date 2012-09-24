<?php

namespace Campus\Entity;

/**
 * Usertype
 *
 * @Table(name="usertype")
 * @Entity(repositoryClass = "Campus\Entity\Repository\UsertypeRepository")
 */
class Usertype
{
    /**
     * @var bigint $userTypeId
     *
     * @Column(name="user_type_id", type="bigint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $userTypeId;

    /**
     * @var string $userType
     *
     * @Column(name="user_type", type="string", length=100, nullable=false)
     */
    private $userType;

    /**
     * Get userTypeId
     *
     * @return bigint $userTypeId
     */
    public function getUserTypeId()
    {
        return $this->userTypeId;
    }

    /**
     * Set userType
     *
     * @param string $userType
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;
    }

    /**
     * Get userType
     *
     * @return string $userType
     */
    public function getUserType()
    {
        return $this->userType;
    }
}