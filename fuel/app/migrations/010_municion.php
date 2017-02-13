<?php 
namespace Fuel\Migrations;

class Municion
{

    function up()
    {
        
       \DBUtil::create_table('municion', array(

            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'velocidad' => array('type' => 'int', 'constraint' => 30),
            'recarga' => array('type' => 'int', 'constraint' => 4),
            'daño' => array('type' => 'int', 'constraint' => 4),                        
            ),
            array('id')
        );

    }

    function down()
    {
       \DBUtil::drop_table('municion');
       
    }

}