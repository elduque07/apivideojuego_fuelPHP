<?php 
namespace Fuel\Migrations;

class Usuarios
{

    function up()
    {
        \DBUtil::create_table('usuarios', array(
            'id' => array('type' => 'int', 'constraint' => 10, 'auto_increment' => true),
            'username' => array('type' => 'varchar', 'constraint' => 250),
            'email' => array('type' => 'varchar', 'constraint' => 30, 'null'=>true),
            'password' => array('type' => 'varchar', 'constraint' => 255),
            'foto' => array('type' => 'varchar', 'constraint' => 255, 'null'=>true),
            'id_jugador' => array('type' => 'int', 'constraint' => 10),
            'id_admin' => array('type' => 'int', 'constraint' => 10),
            ),
            array('id')
        );

        \DB::query("ALTER TABLE `usuarios` ADD UNIQUE(`username`)")->execute();
    }

    function down()
    {
       \DBUtil::drop_table('usuarios');
     
    }

}









