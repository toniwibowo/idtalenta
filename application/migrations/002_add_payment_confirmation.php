<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_payment_confirmation extends CI_Migration{

  public function up()
  {
    $this->dbforge->add_field(array(
      'confirmation_id' => array(
        'type' => 'INT',
        'constraint' => 20,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'user_id' => array(
        'type' => 'INT',
        'constraint' => 11
      ),
      'invoice' => array(
        'type' => 'VARCHAR',
        'constraint' => 10
      ),
      'ammount' => array(
        'type' => 'INT',
        'constraint' => 10
      ),
      'payment_date' => array(
        'type' => 'DATE'
      )
    ));

    $this->dbforge->add_key('confirmation_id', TRUE);
    $this->dbforge->create_table('payment_confirmation');
  }

  public function down()
  {
    $this->dbforge->drop_table('payment_confirmation');
  }

}
