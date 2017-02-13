<?php 
namespace Fuel\Migrations;

class Personajes
{

    function up()
    {
        
       \DBUtil::create_table('personajes', array(

            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'color' => array('type' => 'varchar', 'constraint' => 10),
            'resistencia' => array('type' => 'int', 'constraint' => 5),
            'vida' => array('type' => 'int', 'constraint' => 5),                        
            ),
            array('id')
        );


    }

    function down()
    {
       \DBUtil::drop_table('personajes');
       
    }

}