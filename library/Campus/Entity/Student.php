<?php

namespace Campus\Entity;

/**
 * Student
 *
 * @Table(name="student")
 * @Entity(repositoryClass = "Campus\Entity\Repository\StudentRepository")
 */
class Student
{
    /**
     * @var bigint $studId
     *
     * @Column(name="stud_id", type="bigint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $studId;

    /**
     * @var bigint $studRegno
     *
     * @Column(name="stud_regno", type="bigint", nullable=false)
     */
    private $studRegno;

    /**
     * @var bigint $studEnrolmentStatus
     *
     * @Column(name="stud_enrolment_status", type="bigint", nullable=true)
     */
    private $studEnrolmentStatus;

    /**
     * @var UserProfile
     *
     * @ManyToOne(targetEntity="UserProfile")
     * @JoinColumns({
     *   @JoinColumn(name="stud_prof_id", referencedColumnName="prof_id")
     * })
     */
    private $studProf;

    /**
     * @var Parents
     *
     * @ManyToOne(targetEntity="Parents")
     * @JoinColumns({
     *   @JoinColumn(name="stud_parent_id", referencedColumnName="parent_id")
     * })
     */
    private $studParent;

    /**
     * @var Classes
     *
     * @ManyToOne(targetEntity="Classes")
     * @JoinColumns({
     *   @JoinColumn(name="stud_class_id", referencedColumnName="class_id")
     * })
     */
    private $studClass;

    /**
     * @var School
     *
     * @ManyToOne(targetEntity="School")
     * @JoinColumns({
     *   @JoinColumn(name="stud_school_id", referencedColumnName="school_id")
     * })
     */
    private $studSchool;

    /**
     * Get studId
     *
     * @return bigint $studId
     */
    public function getStudId()
    {
        return $this->studId;
    }

    /**
     * Set studRegno
     *
     * @param bigint $studRegno
     */
    public function setStudRegno($studRegno)
    {
        $this->studRegno = $studRegno;
    }

    /**
     * Get studRegno
     *
     * @return bigint $studRegno
     */
    public function getStudRegno()
    {
        return $this->studRegno;
    }

    /**
     * Set studEnrolmentStatus
     *
     * @param bigint $studEnrolmentStatus
     */
    public function setStudEnrolmentStatus($studEnrolmentStatus)
    {
        $this->studEnrolmentStatus = $studEnrolmentStatus;
    }

    /**
     * Get studEnrolmentStatus
     *
     * @return bigint $studEnrolmentStatus
     */
    public function getStudEnrolmentStatus()
    {
        return $this->studEnrolmentStatus;
    }

    /**
     * Set studProf
     *
     * @param UserProfile $studProf
     */
    public function setStudProf(\UserProfile $studProf)
    {
        $this->studProf = $studProf;
    }

    /**
     * Get studProf
     *
     * @return UserProfile $studProf
     */
    public function getStudProf()
    {
        return $this->studProf;
    }

    /**
     * Set studParent
     *
     * @param Parents $studParent
     */
    public function setStudParent(\Parents $studParent)
    {
        $this->studParent = $studParent;
    }

    /**
     * Get studParent
     *
     * @return Parents $studParent
     */
    public function getStudParent()
    {
        return $this->studParent;
    }

    /**
     * Set studClass
     *
     * @param Classes $studClass
     */
    public function setStudClass(\Classes $studClass)
    {
        $this->studClass = $studClass;
    }

    /**
     * Get studClass
     *
     * @return Classes $studClass
     */
    public function getStudClass()
    {
        return $this->studClass;
    }

    /**
     * Set studSchool
     *
     * @param School $studSchool
     */
    public function setStudSchool(\School $studSchool)
    {
        $this->studSchool = $studSchool;
    }

    /**
     * Get studSchool
     *
     * @return School $studSchool
     */
    public function getStudSchool()
    {
        return $this->studSchool;
    }
}