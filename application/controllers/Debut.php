<?php 
class Debut extends CI_Controller  {
//classe CI_Controller existe dans system/core/Controller.php
//        function index(){
//         	    $this->load->view('vue_message');
//     }

// 	function index(){
// 		$data = array(
// 				'titre' => 'Utilisation de CodeIgniter!',
// 				'message' => 'De bonnes connaissances en PHP 5 et en programmation oriente objet (POO) sont nécessaires  pour pouvoir utiliser CodeIgniter. (Tableaux)'
// 		);
// 		$this->load->view('vue_message2', $data);
// 	}

	function index(){
		//stdClass: la classe passe partout de PHP
		$data = new stdClass();
		$data->titre = 'Utilisation de CodeIgniter!';
		$data->message = 'De bonnes connaissances en PHP 5 et en programmation oriente objet (POO) sont nécessaires  pour pouvoir utiliser CodeIgniter. (Objets)';
		// Mettre dans une variable les données à afficher dans la vue
		$maVue = $this->load->view('vue_message2', $data, TRUE);
		echo $maVue;
		 
	}
	
	
	
}?>

