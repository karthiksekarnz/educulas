<?php

namespace Campus\Entity;

/**
 * UserProfile
 *
 * @Table(name="user_profile")
 * @Entity(repositoryClass = "Campus\Entity\Repository\UserProfileRepository")
 */
class UserProfile
{
    /**
     * @var bigint $profId
     *
     * @Column(name="prof_id", type="bigint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $profId;

    /**
     * @var string $profFirstname
     *
     * @Column(name="prof_name", type="string", length=100, nullable=false)
     */
    private $profName;


    /**
     * @var smallint $profGender
     *
     * @Column(name="prof_gender", type="smallint", nullable=false)
     */
    private $profGender;

    /**
     * @var string $profPicUrl
     *
     * @Column(name="prof_pic_url", type="string", length=100, nullable=true)
     */
    private $profPicUrl;

    /**
     * @var smallint $profNationality
     *
     * @Column(name="prof_nationality", type="smallint", nullable=true)
     */
    private $profNationality;

    /**
     * @var smallint $profReligion
     *
     * @Column(name="prof_religion", type="smallint", nullable=true)
     */
    private $profReligion;

    /**
     * @var smallint $profCaste
     *
     * @Column(name="prof_caste", type="smallint", nullable=true)
     */
    private $profCaste;

    /**
     * @var string $profSteetAddress
     *
     * @Column(name="prof_steet_address", type="string", length=250, nullable=true)
     */
    private $profSteetAddress;

    /**
     * @var string $profDob
     *
     * @Column(name="prof_dob", type="string", length=100, nullable=true)
     */
    private $profDob;

    /**
     * @var string $profPob
     *
     * @Column(name="prof_pob", type="string", length=100, nullable=true)
     */
    private $profPob;

    /**
     * @var string $profPhno
     *
     * @Column(name="prof_phno", type="string", length=100, nullable=true)
     */
    private $profPhno;

    /**
     * @var string $profMobile
     *
     * @Column(name="prof_mobile", type="string", length=100, nullable=true)
     */
    private $profMobile;

    /**
     * @var string $profWebsite
     *
     * @Column(name="prof_website", type="string", length=100, nullable=true)
     */
    private $profWebsite;

    /**
     * @var string $profPassportno
     *
     * @Column(name="prof_passportno", type="string", length=100, nullable=true)
     */
    private $profPassportno;

    /**
     * @var Users
     *
     * @ManyToOne(targetEntity="Users", cascade = {"persist"})
     * @JoinColumns({
     *   @JoinColumn(name="prof_userid", referencedColumnName="userid")
     * })
     */
    private $profUserid;

    /**
     * Get profId
     *
     * @return bigint $profId
     */
    public function getProfId()
    {
        return $this->profId;
    }

    /**
     * Set profFirstname
     *
     * @param string $profName
     */
    public function setProfName($profName)
    {
        $this->profName = $profName;
    }

    /**
     * Get profFirstname
     *
     * @return string $profFirstname
     */
    public function getProfName()
    {
        return $this->profName;
    }

    /**
     * Set profGender
     *
     * @param smallint $profGender
     */
    public function setProfGender($profGender)
    {
        $this->profGender = $profGender;
    }

    /**
     * Get profGender
     *
     * @return smallint $profGender
     */
    public function getProfGender()
    {
        return $this->profGender;
    }

    /**
     * Set profPicUrl
     *
     * @param string $profPicUrl
     */
    public function setProfPicUrl($profPicUrl)
    {
        $this->profPicUrl = $profPicUrl;
    }

    /**
     * Get profPicUrl
     *
     * @return string $profPicUrl
     */
    public function getProfPicUrl()
    {
        return $this->profPicUrl;
    }

    /**
     * Set profNationality
     *
     * @param smallint $profNationality
     */
    public function setProfNationality($profNationality)
    {
        $this->profNationality = $profNationality;
    }

    /**
     * Get profNationality
     *
     * @return smallint $profNationality
     */
    public function getProfNationality()
    {
        return $this->profNationality;
    }

    /**`
     * Set profReligion
     *
     * @param smallint $profReligion
     */
    public function setProfReligion($profReligion)
    {
        $this->profReligion = $profReligion;
    }

    /**
     * Get profReligion
     *
     * @return smallint $profReligion
     */
    public function getProfReligion()
    {
        return $this->profReligion;
    }

    /**
     * Set profCaste
     *
     * @param smallint $profCaste
     */
    public function setProfCaste($profCaste)
    {
        $this->profCaste = $profCaste;
    }

    /**
     * Get profCaste
     *
     * @return smallint $profCaste
     */
    public function getProfCaste()
    {
        return $this->profCaste;
    }

    /**
     * Set profSteetAddress
     *
     * @param string $profSteetAddress
     */
    public function setProfSteetAddress($profSteetAddress)
    {
        $this->profSteetAddress = $profSteetAddress;
    }

    /**
     * Get profSteetAddress
     *
     * @return string $profSteetAddress
     */
    public function getProfSteetAddress()
    {
        return $this->profSteetAddress;
    }

    /**
     * Set profDob
     *
     * @param string $profDob
     */
    public function setProfDob($profDob)
    {
        $this->profDob = $profDob;
    }

    /**
     * Get profDob
     *
     * @return string $profDob
     */
    public function getProfDob()
    {
        return $this->profDob;
    }

    /**
     * Set profPob
     *
     * @param string $profPob
     */
    public function setProfPob($profPob)
    {
        $this->profPob = $profPob;
    }

    /**
     * Get profPob
     *
     * @return string $profPob
     */
    public function getProfPob()
    {
        return $this->profPob;
    }

    /**
     * Set profPhno
     *
     * @param string $profPhno
     */
    public function setProfPhno($profPhno)
    {
        $this->profPhno = $profPhno;
    }

    /**
     * Get profPhno
     *
     * @return string $profPhno
     */
    public function getProfPhno()
    {
        return $this->profPhno;
    }

    /**
     * Set profMobile
     *
     * @param string $profMobile
     */
    public function setProfMobile($profMobile)
    {
        $this->profMobile = $profMobile;
    }

    /**
     * Get profMobile
     *
     * @return string $profMobile
     */
    public function getProfMobile()
    {
        return $this->profMobile;
    }

    /**
     * Set profWebsite
     *
     * @param string $profWebsite
     */
    public function setProfWebsite($profWebsite)
    {
        $this->profWebsite = $profWebsite;
    }

    /**
     * Get profWebsite
     *
     * @return string $profWebsite
     */
    public function getProfWebsite()
    {
        return $this->profWebsite;
    }

    /**
     * Set profPassportno
     *
     * @param string $profPassportno
     */
    public function setProfPassportno($profPassportno)
    {
        $this->profPassportno = $profPassportno;
    }

    /**
     * Get profPassportno
     *
     * @return string $profPassportno
     */
    public function getProfPassportno()
    {
        return $this->profPassportno;
    }

    /**
     * Set profUserid
     *
     * @param Users $profUserid
     */
    public function setProfUserid(\Campus\Entity\Users $profUserid)
    {
        $this->profUserid = $profUserid;
    }

    /**
     * Get profUserid
     *
     * @return Users $profUserid
     */
    public function getProfUserid()
    {
        return $this->profUserid;
    }
}