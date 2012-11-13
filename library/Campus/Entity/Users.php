<?php

namespace Campus\Entity;

/**
 * Users
 *
 * @Table(name="users")
 * @Entity(repositoryClass = "Campus\Entity\Repository\UsersRepository")
 */
class Users
{
    /**
     * @var bigint $userid
     *
     * @Column(name="userid", type="bigint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $userid;

    /**
     * @var string $username
     *
     * @Column(name="username", type="string", length=250, nullable=false)
     */
    private $username;

    /**
     * @var string $password
     *
     * @Column(name="password", type="string", length=250, nullable=false)
     */
    private $password;

    /**
     * @var string $registeredDate
     *
     * @Column(name="registered_date", type="string", length=100, nullable=true)
     */
    private $registeredDate;

    /**
     * @var string $lastVisitedTime
     *
     * @Column(name="last_visited_time", type="string", length=100, nullable=true)
     */
    private $lastVisitedTime;

    /**
     * @var string $lastVisitedIp
     *
     * @Column(name="last_visited_ip", type="string", length=80, nullable=true)
     */
    private $lastVisitedIp;

    /**
     * @var Usertype
     *
     * @ManyToOne(targetEntity="Usertype", cascade = {"persist"})
     * @JoinColumns({
     *   @JoinColumn(name="user_type_id", referencedColumnName="user_type_id")
     * })
     */
    private $userType;

    /**
     * Get userid
     *
     * @return bigint $userid
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string $username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set registeredDate
     *
     * @param string $registeredDate
     */
    public function setRegisteredDate($registeredDate)
    {
        $this->registeredDate = $registeredDate;
    }

    /**
     * Get registeredDate
     *
     * @return string $registeredDate
     */
    public function getRegisteredDate()
    {
        return $this->registeredDate;
    }

    /**
     * Set lastVisitedTime
     *
     * @param string $lastVisitedTime
     */
    public function setLastVisitedTime($lastVisitedTime)
    {
        $this->lastVisitedTime = $lastVisitedTime;
    }

    /**
     * Get lastVisitedTime
     *
     * @return string $lastVisitedTime
     */
    public function getLastVisitedTime()
    {
        return $this->lastVisitedTime;
    }

    /**
     * Set lastVisitedIp
     *
     * @param string $lastVisitedIp
     */
    public function setLastVisitedIp($lastVisitedIp)
    {
        $this->lastVisitedIp = $lastVisitedIp;
    }

    /**
     * Get lastVisitedIp
     *
     * @return string $lastVisitedIp
     */
    public function getLastVisitedIp()
    {
        return $this->lastVisitedIp;
    }

    /**
     * Set userType
     *
     * @param Usertype $userType
     */
    public function setUserType(\Campus\Entity\Usertype $userType)
    {
        $this->userType = $userType;
    }

    /**
     * Get userType
     *
     * @return Usertype $userType
     */
    public function getUserType()
    {
        return $this->userType;
    }

    public static function encryptPassword ($rawpass,$salt)
    {
	$password = sha1($rawpass.sha1($salt));
        return $password;
    }

}