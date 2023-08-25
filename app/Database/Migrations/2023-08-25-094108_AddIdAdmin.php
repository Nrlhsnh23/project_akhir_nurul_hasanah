<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAdminColumnsToProduct extends Migration
{
    public function up()
    {
        $fields = [
            "id_admin" => [
                "type" => "INT",
                "constraint" => 11,
                "null" => true,
            ],
            "nama_admin" => [
                "type" => "VARCHAR",
                "constraint" => 255,
                "null" => true,
            ],
        ];

        $this->forge->addColumn('magangdata', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('magangdata', 'id_admin');
        $this->forge->dropColumn('magangdata', 'nama_admin');
    }
}
