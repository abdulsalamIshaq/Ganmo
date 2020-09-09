<?php
class Post extends Model
{

    public function p()
    {
        $ps = $this->db->query('select * from post');
        $res =  $this->db->fetch($ps);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }
}
?>
