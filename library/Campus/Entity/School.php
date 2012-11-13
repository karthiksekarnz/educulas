<?php

namespace Campus\Entity;

/**
 * School
 *
 * @Table(name="school")
 * @Entity(repositoryClass = "Campus\Entity\Repository\SchoolRepository")
 */
class School
{
    /**
     * @var bigint $schoolId
     *
     * @Column(name="school_id", type="bigint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $schoolId;

    /**
     * @var string $schoolName
     *
     * @Column(name="school_name", type="string", length=100, nullable=false)
     */
    private $schoolName;

    /**
     * @var string $principal
     *
     * @Column(name="principal", type="string", length=20, nullable=true)
     */
    private $principal;

    /**
     * @var string $chairman
     *
     * @Column(name="chairman", type="string", length=20, nullable=true)
     */
    private $chairman;

    /**
     * @var string $adminUsername
     *
     * @Column(name="admin_username", type="string", length=100, nullable=false)
     */
    private $adminUsername;

    /**
     * @var string $adminPassword
     *
     * @Column(name="admin_password", type="string", length=100, nullable=false)
     */
    private $adminPassword;

    /**
     * @var string $streetAddress
     *
     * @Column(name="street_address", type="string", length=100, nullable=false)
     */
    private $streetAddress;

    /**
     * @var string $subscriptionDate
     *
     * @Column(name="subscription_date", type="string", length=100, nullable=false)
     */
    private $subscriptionDate;

    /**
     * @var string $expiryDate
     *
     * @Column(name="expiry_date", type="string", length=100, nullable=false)
     */
    private $expiryDate;

    /**
     * Get schoolId
     *
     * @return bigint $schoolId
     */
    public function getSchoolId()
    {
        return $this->schoolId;
    }

    /**
     * Set schoolName
     *
     * @param string $schoolName
     */
    public function setSchoolName($schoolName)
    {
        $this->schoolName = $schoolName;
    }

    /**
     * Get schoolName
     *
     * @return string $schoolName
     */
    public function getSchoolName()
    {
        return $this->schoolName;
    }

    /**
     * Set principal
     *
     * @param string $principal
     */
    public function setPrincipal($principal)
    {
        $this->principal = $principal;
    }

    /**
     * Get principal
     *
     * @return string $principal
     */
    public function getPrincipal()
    {
        return $this->principal;
    }

    /**
     * Set chairman
     *
     * @param string $chairman
     */
    public function setChairman($chairman)
    {
        $this->chairman = $chairman;
    }

    /**
     * Get chairman
     *
     * @return string $chairman
     */
    public function getChairman()
    {
        return $this->chairman;
    }

    /**
     * Set adminUsername
     *
     * @param string $adminUsername
     */
    public function setUsername($adminUsername)
    {
        $this->adminUsername = $adminUsername;
    }

    /**
     * Get adminUsername
     *
     * @return string $adminUsername
     */
    public function getUsername()
    {
        return $this->adminUsername;
    }

    /**
     * Set adminPassword
     *
     * @param string $adminPassword
     */
    public function setPassword($adminPassword)
    {
        $this->adminPassword = $adminPassword;
    }

    /**
     * Get adminPassword
     *
     * @return string $adminPassword
     */
    public function getPassword()
    {
        return $this->adminPassword;
    }

    /**
     * Set streetAddress
     *
     * @param string $streetAddress
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;
    }

    /**
     * Get streetAddress
     *
     * @return string $streetAddress
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * Set subscriptionDate
     *
     * @param string $subscriptionDate
     */
    public function setSubscriptionDate($subscriptionDate)
    {
        $this->subscriptionDate = $subscriptionDate;
    }

    /**
     * Get subscriptionDate
     *
     * @return string $subscriptionDate
     */
    public function getSubscriptionDate()
    {
        return $this->subscriptionDate;
    }

    /**
     * Set expiryDate
     *
     * @param string $expiryDate
     */
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = $expiryDate;
    }

    /**
     * Get expiryDate
     *
     * @return string $expiryDate
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }
}