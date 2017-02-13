<?php 
namespace Fuel\Migrations;

class Buff
{

    function up()
    {
        
       \DBUtil::create_table('buff', array(

            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'duracion' => array('type' => 'int', 'constraint' => 4),
            'velocidad' => array('type' => 'int', 'constraint' => 3),

            ),
            array('id')
        );
    }

    function down()
    {
       \DBUtil::drop_table('buff');
       
    }

}