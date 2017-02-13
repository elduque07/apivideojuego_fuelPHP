<?php 
namespace Fuel\Migrations;

class Escena
{

    function up()
    {
        
          \DBUtil::create_table('escena', array(

            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'nombre' => array('type' => 'varchar', 'constraint' => 30),
            'descripcion' => array('type' => 'varchar', 'constraint' => 255),
            'imagen' => array('type' => 'varchar', 'constraint' => 255),                        
            ),
            array('id')
        );


    }

    function down()
    {
       \DBUtil::drop_table('escena');
       
    }

}