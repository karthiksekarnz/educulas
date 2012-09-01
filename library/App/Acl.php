<?php

class App_Acl extends Zend_Acl
{
	public function __construct()
	{
		$this->add(new Zend_Acl_Resource(App_Resources::PUBLIC_AREA));
		$this->add(new Zend_Acl_Resource(App_Resources::FREE_AREA));
		$this->add(new Zend_Acl_Resource(App_Resources::PAID_SECTION));
		$this->add(new Zend_Acl_Resource(App_Resources::ADMIN_SECTION));
		
		$this->addRole(new Zend_Acl_Role(App_Roles::GUEST));
		$this
		
	}
	
}
