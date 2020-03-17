<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_wishlist extends CI_Migration{

  public function up()
  {
    $this->dbforge->add_field(array(
      'wishlist_id' => array(
        'type' => 'BIGINT',
        'constraint' => 20,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'user_id' => array(
        'type' => 'INT',
        'constraint' => 11
      ),
      'mentor_class_id' => array(
        'type' => 'INT',
        'constraint' => 11
      )
    ));

    $this->dbforge->add_key('wishlist_id', TRUE);
    $this->dbforge->create_table('wishlist');
  }

  public function down()
  {
    $this->dbforge->drop_table('wishlist');
  }

}
