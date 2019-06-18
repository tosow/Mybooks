<?php
namespace MyBooks\Domain;

Class Author
{
    /**
     * Author id.
     *
     * @var integer
     */
    private  $auth_id ;
	/**
     * Author first name.
     *
     * @var string
     */
    private  $auth_first_name ;
	/**
     * Author last name.
     *
     * @var string
     */
    private $auth_last_name ;
	

	public function getAuth_Id()
	{
	   return $this->auth_id;
	} 

	public function setAuth_Id($auth_id)
	{
	   $this->auth_id=$auth_id;
	   return $this;
	} 

    public function getAuth_First_Name ()
	{
	    return $this->auth_first_name ;
	}

	public function setAuth_First_Name ($auth_first_name )
	{
	    $this->auth_first_name=$auth_first_name ;
		return $this;
	} 

	public function getAuth_Last_Name  ()
	{
	    return $this->auth_last_name ;
	} 

	public function setAuth_Last_Name($auth_last_name )
	{
	   $this->auth_last_name =$auth_last_name ;
	   return $this;
	} 

}


