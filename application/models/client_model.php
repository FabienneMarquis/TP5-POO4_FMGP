<?php
class Client_model extends CI_Model  {
    private $count;
    protected $table = 'client';

    function __construct()
    {
        parent::__construct();
        $this->count = 0;
    }

    public function findAll()
    {
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }



        $query = $this->db->get('client',$start,$offset);
        $this->count = $query->num_rows();
        return $query->result();
    }

//    function findAll2($start,$offset)
//    {
//        $query = $this->db->get('compositeurs',$start,$offset);
//        $this->count = $query->num_rows();
//        return $query->result();
//    }

    function find($id)
    {
        $query = $this->db->get_where('client', array('id' => $id));
        return $query->row();
    }

    function  getCount()
    {
        return $this->count;
    }

    function  getCountTable()
    {
        $query = $this->db->get('client');
        return $query->num_rows();

    }


    function add($data)
    {
        $this->db->insert('client', $data);
        return $this->db->insert_id();
    }

    function update($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('client', $data);
    }

    function delete($id)
    {
        $this->db->delete('client', array('id' => $id));
    }

    function isClientExists($nom,$prenom)
    {
        $query = $this->db->get_where('client', array('nom' => $nom,'prenom'=>$prenom));
        return $query->num_rows() > 0  ;
    }
}

?>
