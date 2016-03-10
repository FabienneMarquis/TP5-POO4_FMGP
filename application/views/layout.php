<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $titre; ?></title>

</head>
<body>

<?php If($context=='list'): ?>
<?php $this->load->view('content',$liste_compositeurs); ?>
<?php Elseif($context=='edit'): ?>
<?php $this->load->view('form_compositeur',$compositeur); ?>
<?php Elseif($context=='message'): ?>
<?php $this->load->view('editSuccess'); ?>  
<?php Else: ?>
Il n'y a pas de compositeur à afficher.
<?php Endif;?>
</body>
</html>