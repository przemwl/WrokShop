<?php

namespace WorkShop\ApplicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="workers")
 */
class Worker 
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $worker_name;
    

    /** 
     * @ORM\Column(type="datetime") 
     */
    private $creation_time;
    
     
    /**
     * @ORM\Column(type="integer")
     */
    private $salary;
    
    
    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $notes;

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
     * Set workerName
     *
     * @param string $workerName
     *
     * @return Worker
     */
    public function setWorkerName($workerName)
    {
        $this->worker_name = $workerName;

        return $this;
    }

    /**
     * Get workerName
     *
     * @return string
     */
    public function getWorkerName()
    {
        return $this->worker_name;
    }

    /**
     * Set creationTime
     *
     * @param \DateTime $creationTime
     *
     * @return Worker
     */
    public function setCreationTime($creationTime)
    {
        $this->creation_time = new \DateTime('now');

        return $this;
    }

    /**
     * Get creationTime
     *
     * @return \DateTime
     */
    public function getCreationTime()
    {
        return $this->creation_time;
    }

    /**
     * Set salary
     *
     * @param integer $salary
     *
     * @return Worker
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * Get salary
     *
     * @return integer
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Worker
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }
}
