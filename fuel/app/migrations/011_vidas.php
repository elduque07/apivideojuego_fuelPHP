<?php 
namespace Fuel\Migrations;

class Vidas
{

    function up()
    {
        
       \DBUtil::create_table('vidas', array(

            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'cantidad' => array('type' => 'int', 'constraint' => 4),
            ),
            array('id')
        );

    }

    function down()
    {
       \DBUtil::drop_table('vidas');
       
    }

}