<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Film_genre extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }


  public function insert($data) {

    $this->db->where($data);

    $query = $this->db->get('film_genre');

    $count_row = $query->num_rows();

    if ($count_row > 0) {
      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
        return FALSE; // here I change TRUE to false.
     } else {
       $this->db->insert('film_genre', $data);
        return TRUE; // And here false to TRUE
     }
}

function delete($id_film,$id_genre){
  $this->db->where('id_film',$id_film);
  $this->db->where_not_in('id_genre', $id_genre);
  $this->db->delete('film_genre');
}

function deleteAll($id_film){
  $this->db->where('id_film',$id_film);
  $this->db->delete('film_genre');
}


function genrebyfilm($id_film){
  $this->db->select('id_genre');
  $this->db->where('id_film',$id_film);
  return $this->db->get('film_genre')->result();
}

}
