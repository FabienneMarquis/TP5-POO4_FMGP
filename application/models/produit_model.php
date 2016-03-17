<?php
/**
 * Created by PhpStorm.
 * User: 0940135
 * Date: 2016-03-16
 * Time: 13:53
 */
class Produit_model extends CI_Model  {
    public $codeArticle;
    public $description;
    public $prix;
    public $quantite;
    public $idCategorie;
    public function __construct()	{
        $this->load->database();
    }
    public function get_produits($id) {
        if($id != FALSE) {
            $query = $this->db->get_where('news', array('id' => $id));
            return $query->row_array();
        }
        else {
            return FALSE;
        }
    }
    public function get_sorted_produits($mot,$categorie,$trie,$order){
        if($mot != FALSE){
            $this->db->like('description',$mot);
        }
        if($categorie != 'tous'){
            $this->db->where('produit.idCategorie',$categorie);
        }
        $this->db->join('categorie','produit.idCategorie = categorie.idCategorie');
        $this->db->order_by($trie,$order);
        $query = $this->db->get('produit');
        return $query->result();
    }
}