<?php
/* 
 *  Copyright 2012 Actuality, Inc.
 * 
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 * 
 *       http://www.apache.org/licenses/LICENSE-2.0
 * 
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 *  under the License.
 */
namespace Campus\Entity;

/**
 * @Entity
 * @Table[name="users"]
 * @author karthik sekar
 */
class Users {
    
    /**
     * @Id @GeneratedValue
     * @Column(name="userid",type="bigint")
     * @var integer
     */
    protected $id;

    /**
     * @Column(type="string", length=250)
     * @var string
     */
    protected $username;

    /**
     * @Column(type="string", length=250)
     * @var string
     */
    protected $password;

    /**
     * @Column(type="bigint")
     * @var integer
     */
    protected $user_type;

    /**
     * @Column(type="datetime", length=150)
     * @var string
     */
    protected $registered_date;

    /**
     * @Column(type="datetime", length=20)
     * @var string
     */
    protected $last_visited_time;

    /**
     * @Column(type="string", length=80)
     * @var string
     */
    protected $last_visited_ip;

    
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getUser_type() {
        return $this->user_type;
    }

    public function setUser_type($user_type) {
        $this->user_type = $user_type;
    }

    public function getRegistered_date() {
        return $this->registered_date;
    }

    public function setRegistered_date($registered_date) {
        $this->registered_date = $registered_date;
    }

    public function getLast_visited_time() {
        return $this->last_visited_time;
    }

    public function setLast_visited_time($last_visited_time) {
        $this->last_visited_time = $last_visited_time;
    }

    public function getLast_visited_ip() {
        return $this->last_visited_ip;
    }

    public function setLast_visited_ip($last_visited_ip) {
        $this->last_visited_ip = $last_visited_ip;
    }


}
?>
