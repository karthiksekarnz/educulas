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

/**
 * @Entity
 * @author karthik sekar
 */

class Users {

    /*
     * @Id @GeneratedValue
     * @Column(name="userid",type="bigint")
     * @var integer
     */
    protected $id;

    /*
     * @Column(name="username",type="string",length=250,nullable=false)
     * @var string
     */
    private $userName;

    /*
     * @Column(name="password", type="string",length=250,nullable=false)
     * @var string
     */
    private $password;

    /*
     * @Column(name="registered_date",type="string",nullable=false)
     * @var string
     */
    private $registered_date;

    /*
     * @Column(name="last_visited_time", type="string",nullable=false)
     * @var string
     */
    private $visited_time;

    /*
     * @Column(name="visited_ip", type="string",length=25)
     * @var string
     */
    private $visited_ip;
}
?>
