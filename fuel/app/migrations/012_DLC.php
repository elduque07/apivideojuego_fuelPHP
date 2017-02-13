<?php 
namespace Fuel\Migrations;

class DLC
{

    function up()
    {
        
       \DBUtil::create_table('DLC', array(

            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'nombre' => array('type' => 'varchar', 'constraint' => 15),
            'descripcion' => array('type' => 'varchar', 'constraint' => 255),
            'foto' => array('type' => 'varchar', 'constraint' => 255),

            ),
            array('id')
        );
    }

    function down()
    {
       \DBUtil::drop_table('DLC');
       
    }

}