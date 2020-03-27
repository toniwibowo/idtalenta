<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_log_class_view extends CI_Migration{

  public function up()
  {
    $this->dbforge->add_field(array(
      'log_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'mentor_class_id' => array(
        'type' => 'INT',
        'constraint' => 11
      ),
      'ip_address' => array(
        'type' => 'VARCHAR',
        'constraint' => 50
      ),
      'view_date' => array(
        'type' => 'DATE'
      )
    ));

    $this->dbforge->add_key('log_class_view', TRUE);
    $this->dbforge->create_table('log_class_view');
  }

  public function down()
  {
    $this->dbforge->drop_table('log_class_view');
  }

}
