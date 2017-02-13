<?php

class Model_users extends Orm\Model
{
    protected static $_table_name = 'usuarios';
    protected static $_primary_key = array('id');
    protected static $_properties = array(
        'id', // both validation & typing observers will ignore the PK

        'username' => array(
            'data_type' => 'varchar'    
        ),

        'password' => array(
            'data_type' => 'varchar'  
        ),

        'email' => array(
            'data_type' => 'varchar'   
        ),

        'foto' => array(
            'data_type' => 'varchar'

        )
        
    );

}