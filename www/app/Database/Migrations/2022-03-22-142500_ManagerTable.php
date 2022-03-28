<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ManagerTable extends Migration
{
    public function up()
    {
        $cols=[
            'managerId'=>[
                'type'=>'VARCHAR',
                'constraint'=>20
            ],
            'managerPwd'=>[
                'type'=>'VARCHAR',
                'constraint'=>100
            ],
            'managerName'=>[
                'type'=>'VARCHAR',
                'constraint'=>20
            ],
            'level'=>[
                'type'=>'INT',
                'constraint'=>1
            ],
            'lastDateTime'=>[
                'type'=>'VARCHAR',
                'constraint'=>20
            ]
        ];
        $this->forge->addField($cols);
        $this->forge->addPrimaryKey('managerId');
        $this->forge->createTable('Manager');
    }

    public function down()
    {
        
    }
}
