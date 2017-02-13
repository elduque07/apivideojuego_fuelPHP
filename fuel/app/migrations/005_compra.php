<?php 
namespace Fuel\Migrations;

class Compra
{

    function up()
    {
        
          \DBUtil::create_table('compra', array(

            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'id_jugador' => array('type' => 'int', 'constraint' => 5),
            'id_item' => array('type' => 'int', 'constraint' => 15),            
            ),
            array('id')
        );


    }

    function down()
    {
       \DBUtil::drop_table('compra');
       
    }

}