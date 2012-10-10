<?php

namespace Campus\Entity;

/**
 * Attendance
 *
 * @Table(name="attendance")
 * @Entity(repositoryClass = "Campus\Entity\Repository\AttendanceRepository")
 */

class Attendance
{
    /**
     * @var bigint $attdId
     *
     * @Column(name="attd_id", type="bigint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $attdId;

    /**
     * @var date $attdDate
     *
     * @Column(name="attd_date", type="date", nullable=false)
     */
    private $attdDate;

    /**
     * @var smallint $attdRating
     *
     * @Column(name="attd_rating", type="smallint", nullable=true)
     */
    private $attdRating;

    /**
     * @var string $attdComment
     *
     * @Column(name="attd_comment", type="string", length=100, nullable=true)
     */
    private $attdComment;

    /**
     * @var Student
     *
     * @ManyToOne(targetEntity="Student")
     * @JoinColumns({
     *   @JoinColumn(name="stud_id", referencedColumnName="stud_id")
     * })
     */
    private $stud;

    /**
     * @var Classes
     *
     * @ManyToOne(targetEntity="Classes")
     * @JoinColumns({
     *   @JoinColumn(name="class_id", referencedColumnName="class_id")
     * })
     */
    private $class;

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
     * Get attdId
     *
     * @return bigint $attdId
     */
    public function getAttdId()
    {
        return $this->attdId;
    }

    /**
     * Set attdDate
     *
     * @param date $attdDate
     */
    public function setAttdDate($attdDate)
    {
        $this->attdDate = $attdDate;
    }

    /**
     * Get attdDate
     *
     * @return date $attdDate
     */
    public function getAttdDate()
    {
        return $this->attdDate;
    }

    /**
     * Set attdRating
     *
     * @param smallint $attdRating
     */
    public function setAttdRating($attdRating)
    {
        $this->attdRating = $attdRating;
    }

    /**
     * Get attdRating
     *
     * @return smallint $attdRating
     */
    public function getAttdRating()
    {
        return $this->attdRating;
    }

    /**
     * Set attdComment
     *
     * @param string $attdComment
     */
    public function setAttdComment($attdComment)
    {
        $this->attdComment = $attdComment;
    }

    /**
     * Get attdComment
     *
     * @return string $attdComment
     */
    public function getAttdComment()
    {
        return $this->attdComment;
    }

    /**
     * Set stud
     *
     * @param Student $stud
     */
    public function setStud(\Student $stud)
    {
        $this->stud = $stud;
    }

    /**
     * Get stud
     *
     * @return Student $stud
     */
    public function getStud()
    {
        return $this->stud;
    }

    /**
     * Set class
     *
     * @param Classes $class
     */
    public function setClass(\Classes $class)
    {
        $this->class = $class;
    }

    /**
     * Get class
     *
     * @return Classes $class
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set school
     *
     * @param School $school
     */
    public function setSchool(\School $school)
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
}