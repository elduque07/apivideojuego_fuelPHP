<?php 
namespace Fuel\Migrations;

class Logro
{

    function up()
    {
        
       \DBUtil::create_table('logro', array(

            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'nombre' => array('type' => 'varchar', 'constraint' => 3),   

            ),
            array('id')
        );
    }

    function down()
    {
       \DBUtil::drop_table('logro');
       
    }

}