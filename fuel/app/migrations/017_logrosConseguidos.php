<?php 
namespace Fuel\Migrations;

class logrosConseguidos
{

    function up()
    {
        
       \DBUtil::create_table('logros_conseguidos', array(

            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'id_logro' => array('type' => 'int', 'constraint' => 5),
            'id_user' => array('type' => 'varchar', 'constraint' => 3),   

            ),
            array('id')      
        );

    }

    function down()
    {
       \DBUtil::drop_table('logros_conseguidos');
       
    }

}