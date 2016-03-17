<?php

/**
 * Created by PhpStorm.
 * User: 1494778
 * Date: 2016-03-08
 * Time: 15:25
 */
class Controller extends CI_Controller
{

    /**
     * Function to display the AddClient form
     */
    public function getAddClient()
    {
        if (isset($this->session->userdata['isLoggedIn']) && $this->session->userdata['isLoggedIn']) {
            $this->load->view('Header');
            $this->load->view('NavBar');
            $query = $this->db->get('ville');
            foreach ($query->result() as $row) {
                $villes[] = $row;
            }
            $this->load->view('addClient', array('villes' => $villes));
            $this->load->view('Footer');
        } else {
            redirect('/', 'refresh');
        }
    }

    /**
     * Function to receive the POST from the AddClient form
     */
    public function postAddClient()
    {
        $data['nom'] = $this->input->post('nom', TRUE);
        $data['prenom'] = $this->input->post('prenom', TRUE);
        $data['ageClient'] = $this->input->post('age', TRUE);
        $data['courrielClient'] = $this->input->post('courriel', TRUE);
        $data['adresse'] = $this->input->post('adresse', TRUE);
        $data['idVille'] = $this->input->post('ville', TRUE);
        $bool = $this->client_model->add($data);
        if (!$bool . is_null()) {
            redirect('/addClient', 'refresh');
        } else {
            redirect('/getAddClient', 'refresh');
        }

    }

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('NavBar');
        $this->load->view('Login');
        $this->load->view('Footer');
    }

    /**
     * Function to display the Sign up form
     */
    public function getSignUp()
    {
        $this->load->view('Header');
        $this->load->view('NavBar');
        $this->load->view('SignUp');
        $this->load->view('Footer');
    }

    /**
     * Function to receive the post from the sign up
     */
    public function postSignUp()
    {
//        $data = array(
//            'email' => $this->input->post('email'),
//            'pwd' => $this->input->post('pwd')
//        );
        $data["adresseEmail"] = $this->input->post('email', TRUE);
        $data["motDePasse"] = sha1($this->input->post('pwd', TRUE));
        $bool = $this->user_m->signUp($data);
        if (bool . is_null()) {
            redirect('/');
        } else(redirect('/Controller/GetSignUp'));
    }


    /**
     * Function to display the Consulter form
     */
    public function getConsulter()
    {
        if (isset($this->session->userdata['isLoggedIn']) && $this->session->userdata['isLoggedIn']) {
            $this->load->view('Header');
            $this->load->view('NavBar');
            $categories = array();
            $query = $this->db->get('categorie');
            foreach ($query->result() as $row) {
                $categories[] = $row;
            }
            $this->load->view('Consulter', array('categories' => $categories));

            $this->load->view('Footer');
        } else {
            redirect('/', 'refresh');
        }
    }

    /**
     * Function to receive the Consulter form POST
     */
    public function postConsulter()
    {

        $mot = $this->input->post('mot');
        $categorie = $this->input->post('categorie');
        $trie = $this->input->post('trie');
        $order = $this->input->post('order');

        $this->load->model('Produit_model');
        $produits = $this->Produit_model->get_sorted_produits($mot, $categorie, $trie, $order);
        echo json_encode($produits);

    }

    /**
     * Function to display de form about selecting the client to modify
     */
    public
    function getSelectClient()
    {
        if (isset($this->session->userdata['isLoggedIn']) && $this->session->userdata['isLoggedIn']) {
            $this->load->view('Header');
            $this->load->view('NavBar');
            $this->load->view('SelectClientToModify');
            $this->load->view('Footer');
        } else {
            redirect('/', 'refresh');
        }

    }

    /**
     * Function to receive the POST form of the selected client
     */
    public
    function postSelectClient()
    {
            $data['nom'] = $this->input->post('nom', TRUE);
            $data['prenom'] = $this->input->post('prenom', TRUE);
            $data['ageClient'] = $this->input->post('age', TRUE);
            $data['courrielClient'] = $this->input->post('nom', TRUE);
            $data['adresse'] = $this->input->post('prenom', TRUE);
            $data['idVille'] = $this->input->post('age', TRUE);
        redirect('/', 'refresh');
    }

    /**
     * Function to display a client to modify
     * @param int $id
     */
    public
    function getModifyClient($id = 0)
    {
        if (isset($this->session->userdata['isLoggedIn']) && $this->session->userdata['isLoggedIn']) {

            $this->load->view('Header');
            $this->load->view('NavBar');
            if ($id === 0) {
                $this->load->view('SelectClientToModify');
            } else {
                $req = $this->client_model->find($id);
                if(!$req.is_null()){
                $this->load->view('ModifyClient', array("id" => $id));
                //loader les info du row dans le formulaire ...
                    }
                else{$this->load->view('SelectClientToModify');}
            }

            $this->load->view('Footer');

        } else {
            redirect('/', 'refresh');
        }

    }

    /**
     * Receive the POST from the modify client form
     */
    public
    function postModifyClient()
    {
        $id = $this->input->post('id',true);


        $data['nom'] = $this->input->post('nom', TRUE);
        $data['prenom'] = $this->input->post('prenom', TRUE);
        $data['ageClient'] = $this->input->post('age', TRUE);
        $data['courrielClient'] = $this->input->post('nom', TRUE);
        $data['adresse'] = $this->input->post('prenom', TRUE);
        $data['idVille'] = $this->input->post('age', TRUE);
        $this->client_model->update($id, $data);
    }

    public
    function postLogin()
    {
        $email = $this->input->post('email', TRUE);
        $pwd = $this->input->post('pwd', TRUE);
        $bool = $this->user_m->validate_user($email, $pwd);
        if ($bool == true) {
            redirect('/Controller/getAddClient', 'refresh');
        } else {
            redirect('/', 'refresh');
        }
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
        $this->load->view("AddClient");
    }

    public
    function testClientExists()
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