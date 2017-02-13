<?php 
namespace Fuel\Migrations;

class minas
{

    function up()
    {
        
       \DBUtil::create_table('minas', array(

            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'daño' => array('type' => 'int', 'constraint' => 3),
            'radio' => array('type' => 'int', 'constraint' => 3),

            ),
            array('id')
        );
    }

    function down()
    {
       \DBUtil::drop_table('minas');
       
    }

}