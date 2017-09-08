<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model{

	public function do_insert($dados=NULL){
		if($dados!=NULL):
			$this->db->insert('pessoa',$dados);
			//utilização de session para confirmar cadastro
			$this->session->set_flashdata('cadastrook','Cadastro realizado com sucesso!');
			redirect('crud/create');
		endif;
	}

}