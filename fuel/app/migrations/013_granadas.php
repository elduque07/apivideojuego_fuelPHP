<?php 
namespace Fuel\Migrations;

class granadas
{

    function up()
    {
        
       \DBUtil::create_table('granadas', array(

            'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
            'daño' => array('type' => 'int', 'constraint' => 3),
            'alcance' => array('type' => 'int', 'constraint' => 3),

            ),
            array('id')
        );
    }

    function down()
    {
       \DBUtil::drop_table('granadas');
       
    }

}