<?php 
namespace Fuel\Migrations;

class Jugadores
{

    function up()
    {
        


         \DBUtil::create_table('jugadores', array(

            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'alias' => array('type' => 'varchar', 'constraint' => 10),
            'puntuacionMax' => array('type' => 'int', 'constraint' => 10),
            
            ),
            array('id')
        );

    }

    function down()
    {
       \DBUtil::drop_table('jugadores');
       
    }

}