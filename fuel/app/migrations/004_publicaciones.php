<?php 
namespace Fuel\Migrations;

class Publicaciones
{

    function up()
    {
        
        \DBUtil::create_table('publicaciones', array(

            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'id_jugador' => array('type' => 'int', 'constraint' => 30),  //DUDA FK a alias o a IDuser
            'contenido' => array('type' => 'varchar', 'constraint' => 255),
            ),
            array('id')
        );
    }

    function down()
    {
       \DBUtil::drop_table('publicaciones');
       
    }

}