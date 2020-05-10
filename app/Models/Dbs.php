<?PHP
namespace App\Models;

use CodeIgniter\Model;

class Dbs extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    // STANDAR FUNCTION

    function rowArray($field, $value, $table, $select = "*")
    {
        return $this->db->table($table)->select($select)->where($field, $value)->get()->getRowArray();
    }

    function result($table, $select = "*")
    {
        return $this->db->table($table)->select($select)->get()->getResult();
    }
    
    function resultKey($field, $value, $table, $order_by = "id ASC", $select = "*")
    {
        return $this->db->table($table)->select($select)->where($field, $value)->orderBy($order_by)->get()->getResult();
    }

    function updateData($field, $value, $data, $table)
    {
        return $this->db->table($table)->where($field, $value)->update($data);
    }

    function insertData($data, $table)
    {
        return $this->db->table($table)->insert($data, TRUE);
    }

    function deleteData($field, $value, $table)
    {
        return $this->db->table($table)->where($field, $value)->delete();
    }

    // END STANDART FUNCTION
}