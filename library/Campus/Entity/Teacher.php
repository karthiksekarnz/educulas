<?php

namespace Campus\Entity;

/**
 * Teacher
 *
 * @Table(name="teacher")
 * @Entity(repositoryClass = "Campus\Entity\Repository\TeacherRepository")
 */
class Teacher
{
    /**
     * @var bigint $staffId
     *
     * @Column(name="staff_id", type="bigint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $staffId;

    /**
     * @var string $joinDate
     *
     * @Column(name="join_date", type="string", length=100, nullable=true)
     */
    private $joinDate;

    /**
     * @var string $qualification
     *
     * @Column(name="qualification", type="string", length=100, nullable=true)
     */
    private $qualification;

    /**
     * @var School
     *
     * @ManyToOne(targetEntity="School")
     * @JoinColumns({
     *   @JoinColumn(name="school_id", referencedColumnName="school_id")
     * })
     */
    private $school;

    /**
     * @var UserProfile
     *
     * @ManyToOne(targetEntity="UserProfile", cascade = {"persist"})
     * @JoinColumns({
     *   @JoinColumn(name="profile_id", referencedColumnName="prof_id")
     * })
     */
    private $profile;

    /**
     * Get staffId
     *
     * @return bigint $staffId
     */
    public function getStaffId()
    {
        return $this->staffId;
    }

    /**
     * Set joinDate
     *
     * @param string $joinDate
     */
    public function setJoinDate($joinDate)
    {
        $this->joinDate = $joinDate;
    }

    /**
     * Get joinDate
     *
     * @return string $joinDate
     */
    public function getJoinDate()
    {
        return $this->joinDate;
    }

    /**
     * Set qualification
     *
     * @param string $qualification
     */
    public function setQualification($qualification)
    {
        $this->qualification = $qualification;
    }

    /**
     * Get qualification
     *
     * @return string $qualification
     */
    public function getQualification()
    {
        return $this->qualification;
    }

    /**
     * Set school
     *
     * @param School $school
     */
    public function setSchool(\Campus\Entity\School $school)
    {
        $this->school = $school;
    }

    /**
     * Get school
     *
     * @return School $school
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * Set profile
     *
     * @param UserProfile $profile
     */
    public function setProfile(\Campus\Entity\UserProfile $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Get profile
     *
     * @return UserProfile $profile
     */
    public function getProfile()
    {
        return $this->profile;
    }
}