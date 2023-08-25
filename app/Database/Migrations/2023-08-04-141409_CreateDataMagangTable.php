<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDataMagangTable extends Migration
{
    public function up()
    {
        $fields = [
            "id" => [
                "type" => "INT",
                "unsigned" => true,
                "auto_increment" => true,
            ],
            "nama_umkm" => [
                "type" => "VARCHAR",
                "constraint" => "200",
            ],
            "kodepos" => [
                "type" => "VARCHAR",
                "constraint" => "200",
            ],
            "kecamatan" => [
                "type" => "VARCHAR",
                "constraint" => "200",
            ],
            "status_akun_halal" => [
                "type" => "VARCHAR",
                "constraint" => "200",
            ],
            "status_akun_nib" => [
                "type" => "VARCHAR",
                "constraint" => "200",
            ],
            "pendaftaran" => [
                "type" => "VARCHAR",
                "constraint" => "200",
            ],
        ];
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('magangdata', true); //If NOT EXISTS create table products
    }

    public function down()
    {
        $this->forge->dropTable('magangdata', true); //If Exists drop table products
    }
}