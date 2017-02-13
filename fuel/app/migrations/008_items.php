<?php 
namespace Fuel\Migrations;

class Items
{

    function up()
    {
        
         \DBUtil::create_table('items', array(

            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'id_personaje' => array('type' => 'int', 'constraint' => 10),
            'id_municion' => array('type' => 'int', 'constraint' => 10),
            'id_DLC' => array('type' => 'int', 'constraint' => 10),
            'id_granada' => array('type' => 'int', 'constraint' => 10),
            'id_mina' => array('type' => 'int', 'constraint' => 10),
            'id_buff' => array('type' => 'int', 'constraint' => 10),
            'id_vida' => array('type' => 'int', 'constraint' => 10),
            'cantidad' => array('type' => 'int', 'constraint' => 10),
            ),
            array('id')
        );

    }

    function down()
    {
       \DBUtil::drop_table('items');
       
    }

}