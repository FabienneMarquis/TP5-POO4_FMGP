<?php

//var $details;
class User_m extends CI_Model
{
    function validate_user($email, $pwd)
    {
        // Build a query to retrieve the user's details
        // based on the received username and password
        $this->db->from('utilisateur');
        $this->db->where('adresseEmail', $email);
        $this->db->where('motDePasse', sha1($pwd));
        $login = $this->db->get()->result();

        // The results of the query are stored in $login.
        // If a value exists, then the user account exists and is validated
        if (is_array($login) && count($login) == 1) {
            // Set the users details into the $details property of this class
            $this->details = $login[0];
            // Call set_session to set the user's session vars via CodeIgniter
            $this->set_session();
            return true;
        } else {
            $this->session->set_userdata(array('isLoggedIn' => false));
        }
        return false;
    }

    function set_session()
    {
        // session->set_userdata is a CodeIgniter function that
        // stores data in a cookie in the user's browser.  Some of the values are built in
        // to CodeIgniter, others are added (like the IP address).  See CodeIgniter's documentation for details.
        $this->session->set_userdata(array(
                'id' => $this->details->id,
                'adresseEmail' => $this->details->adresseEmail,
                'dateInscription' => $this->details->dateInscription,
                'isLoggedIn' => true
            )
        );
    }

    function signUp($data)
    {
        $this->db->from('utilisateur');
        $this->db->insert('utilisateur', $data);
        return $this->db->insert_id();
    }
}
