<?php 
namespace Fuel\Migrations;

class Administradores
{

    function up()
    {
        


          \DBUtil::create_table('administradores', array(

            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'nombre' => array('type' => 'varchar', 'constraint' => 15),
            'apellidos' => array('type' => 'varchar', 'constraint' => 15),
            'telefono' => array('type' => 'varchar', 'constraint' => 20),
            ),
            array('id')
        );

    }

    function down()
    {
       \DBUtil::drop_table('administradores');
       
    }

}