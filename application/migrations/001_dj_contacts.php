<? defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Allow_publish extends CI_Migration {

    public function up()
    {
        $fields = array(
            'id'
        );
        
        $this->dbforge->add_column('blog', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('blog', 'published');
    }
}
