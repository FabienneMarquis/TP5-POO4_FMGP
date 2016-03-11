<?php
/**
 * Created by PhpStorm.
 * User: 1494778
 * Date: 2016-03-08
 * Time: 15:25
 */

class Controller extends CI_Controller   {

    public function AddClient(){
        $this->load->view('Header');
        $this->load->view('AddClient');
    }

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('ViewConnection');
    }

    public function summit(){
        $data = array(
            'email' => $this->input->post('courriel'),
            'pwd'=>$this->input->post('pwd')
        );
        echo json_encode($data);
        $this->user_m->validate_user($data);
    }

    public function ModifyClient(){
        $this->load->view('Header');
        $this->load->view('ModifyClient');
    }

    public function Consulter(){
        $this->load->view('Header');
        $this->load->view('Consulter');
    }

    public function add()
    {
        $data['nom'] = $this->input->post('nom',TRUE);
        $data['prenom'] = $this->input->post('prenom',TRUE);
        $data['ageClient'] = $this->input->post('age',TRUE);
        $data['courrielClient'] = $this->input->post('nom',TRUE);
        $data['adresse'] = $this->input->post('prenom',TRUE);
        $data['idVille'] = $this->input->post('age',TRUE);
        $this->client_model->add($data);
        $data['context'] = 'message';
        $data['titre'] = 'Saisie validée';
        $this->load->view('layout',$data);
    }

    public function  delete()
    {

        $id = $this->uri->segment(3,-1);
        $this->client_model->delete($id);
        $data['context'] = 'message';
        $this->load->view('layout',$data);

    }

    public function show_update($id=-1)
    {
        if($id==-1)
            $id = $this->uri->segment(3,-1);
        $data['compositeur'] = array('compositeur'=> $this->client_model->find($id));
        $data['context'] = 'edit';
        $data['mode'] = 'update';
        $data['mode_titre'] = 'Modifier';
        $data['id'] = $id;
        $data['titre'] = 'Liste de compositeurs';
        $data['titre_edit'] = 'Modifier un compositeur';
        $this->load->view('layout',$data);
    }


    public function testClientExists()
    {

        $prenom = $this->input->post('prenom',TRUE);
        $nom = $this->input->post('nom',TRUE);

        $test = $this->client_model->isClientExists($nom,$prenom);

        if ($test)
        {
            $this->form_validation->set_message('testClientExists', 'Ce nom et ce prénom éxistent déjà');
            return FALSE;

        }
        return  $test;
    }
}