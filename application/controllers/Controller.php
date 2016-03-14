<?php

/**
 * Created by PhpStorm.
 * User: 1494778
 * Date: 2016-03-08
 * Time: 15:25
 */
class Controller extends CI_Controller
{

    public function AddClient()
    {
        $this->load->view('Header');
        $this->load->view('AddClient');
    }

    public function index()
    {
        $this->load->view('Header_connection');
        $this->load->view('ViewConnection');
    }

    public function sign_up()
    {
        $data = array(
            'email' => $this->input->post('courriel'),
            'pwd' => $this->input->post('pwd')
        );
        $this->load-> model('user_m');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'callback_username_check');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            //mettre view erreur?
        } else {
            $profile = $this->user_m->validate_user($data);
            if ($profile) {
                $this->Controller->AddClient();
            }
        }
    }

    public function update()
    {
        $data['nom'] = $this->input->post('nom', TRUE);
        $data['prenom'] = $this->input->post('prenom', TRUE);
        $data['ageClient'] = $this->input->post('age', TRUE);
        $data['courrielClient'] = $this->input->post('nom', TRUE);
        $data['adresse'] = $this->input->post('prenom', TRUE);
        $data['idVille'] = $this->input->post('age', TRUE);
        $this->client_model->update($data);
    }

    public function username_check($str)
    {
        if ($str == 'test') {
            $this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function ModifyClient()
    {
        $this->load->view('Header');
        $this->load->view('ModifyClient');
    }

    public function Consulter()
    {
        $this->load->view('Header');
        $this->load->view('Consulter');
    }

    public function add()
    {
        $data['nom'] = $this->input->post('nom', TRUE);
        $data['prenom'] = $this->input->post('prenom', TRUE);
        $data['ageClient'] = $this->input->post('age', TRUE);
        $data['courrielClient'] = $this->input->post('nom', TRUE);
        $data['adresse'] = $this->input->post('prenom', TRUE);
        $data['idVille'] = $this->input->post('age', TRUE);
        $this->client_model->add($data);
        $data['context'] = 'message';
        $data['titre'] = 'Saisie validée';
        $this->load->view('addClient');
    }

    public function delete()
    {
        $id = $this->uri->segment(3, -1);
        $this->client_model->delete($id);
        $data['context'] = 'message';
    }

    public function searchClient()
    {
        $id = $this->input->post('code_client', true);
        $this->load->model('client_model');
        $row = $this->client_model->find($id);
        if($row!=null){

        }

    }

    public function testClientExists()
    {

        $prenom = $this->input->post('prenom', TRUE);
        $nom = $this->input->post('nom', TRUE);

        $test = $this->client_model->isClientExists($nom, $prenom);

        if ($test) {
            $this->form_validation->set_message('testClientExists', 'Ce nom et ce prénom éxistent déjà');
            return FALSE;

        }
        return $test;
    }
}