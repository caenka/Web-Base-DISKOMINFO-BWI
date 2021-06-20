<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Tb_user extends CI_Migration
{

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id_user' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'nama' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                                'null' => FALSE,
                        ),
                        'email' => array(
                                'type' => 'varchar',
                                'constraint' => '100',
                        ),
                        'password' => array(
                                'type' => 'varchar',
                                'constraint' => '100',
                        ),
                        'role_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'is_active' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'bidang' => array(
                                'type' => 'ENUM("Bidang TI","Bidang Sandi","Bidang Kesekretariatan","Bidang IKP")',
                                'null' => FALSE,
                        ),

                ));
                $this->dbforge->add_key('id_user', TRUE);
                $this->dbforge->create_table('tb_user');
        }

        public function down()
        {
                $this->dbforge->drop_table('tb_user');
        }
}
