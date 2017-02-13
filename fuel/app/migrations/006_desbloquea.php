<?php 
namespace Fuel\Migrations;

class Desbloquea
{

    function up()
    {
        
          \DBUtil::create_table('desbloquea', array(

            'id_jugador' => array('type' => 'int', 'constraint' => 5),
            'id_nivel' => array('type' => 'int', 'constraint' => 15),            
            ),
            array('id_jugador','id_nivel')
        );


    }

    function down()
    {
       \DBUtil::drop_table('desbloquea');
       
    }

}