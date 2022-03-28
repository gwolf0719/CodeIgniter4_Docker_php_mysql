<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Manager extends Seeder
{
    public function run()
    {
        //
        $data = array(
            'managerId'=>'james',
            'managerPwd'=>'wolf0719',
            'managerName'=>'james',
            'level'=>1,
            'lastDateTime'=>date("Y-m-d H:i:s")
        );
        $this->db->table('Manager')->insert($data);
    }
}
