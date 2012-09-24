<?php

namespace Campus\Entity;

/**
 * Parents
 *
 * @Table(name="parents")
 * @Entity(repositoryClass = "Campus\Entity\Repository\ParentsRepository")
 */
class Parents
{
    /**
     * @var bigint $parentId
     *
     * @Column(name="parent_id", type="bigint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $parentId;

    /**
     * @var Student
     *
     * @ManyToOne(targetEntity="Student")
     * @JoinColumns({
     *   @JoinColumn(name="student_id", referencedColumnName="stud_id")
     * })
     */
    private $student;

    /**
     * @var UserProfile
     *
     * @ManyToOne(targetEntity="UserProfile")
     * @JoinColumns({
     *   @JoinColumn(name="parent_prof_id", referencedColumnName="prof_id")
     * })
     */
    private $parentProf;

    /**
     * Get parentId
     *
     * @return bigint $parentId
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set student
     *
     * @param Student $student
     */
    public function setStudent(\Student $student)
    {
        $this->student = $student;
    }

    /**
     * Get student
     *
     * @return Student $student
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set parentProf
     *
     * @param UserProfile $parentProf
     */
    public function setParentProf(\UserProfile $parentProf)
    {
        $this->parentProf = $parentProf;
    }

    /**
     * Get parentProf
     *
     * @return UserProfile $parentProf
     */
    public function getParentProf()
    {
        return $this->parentProf;
    }
}