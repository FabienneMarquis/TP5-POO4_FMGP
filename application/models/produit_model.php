<?php

/**
 * Created by PhpStorm.
 * User: 1494778
 * Date: 2016-03-14
 * Time: 13:33
 */
class produit_model extends CI_Model
{
    protected $table = 'produit';

    function __construct()
    {
        parent::__construct();

    }

    public function findAll()
    {
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }

        $query = $this->db->get('produit', $start, $offset);
        $this->count = $query->num_rows();
        return $query->result();
    }

    public function findKeyWord($kw)
    {
        //à vérifier
        $query = $this->db->get_where('produit', array('descriptions' => $kw));
        return $query->row();
    }

    public function findCategorie($idCat)
    {
        $query = $this->db->get_where('produit', array('idCategorie' => $idCat));
        return $query->row();
    }

    public function findOrderBy($by, $type, $idCat)
    {
        if ($type == "croissant") {
            switch ($by) {
                case "prix":
                    $query="";
                    break;
                case "quantity":

                    break;
            }
        } else if ($type == "decroissant") {
            switch ($by) {
                case "prix":

                    break;
                case "quantity":

                    break;
            }
        }
        return $query->row();
    }


}