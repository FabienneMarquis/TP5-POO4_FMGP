<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url() ?>index.php">TP5-POO4</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo base_url() ?>index.php/Controller/AddClient"> Ajouter un client<span class="sr-only">(current)</span></a></li>
                <li><a href="<?php echo base_url() ?>index.php/Controller/ModifyClient">Modifier un client</a></li>
                <li><a href="<?php echo base_url() ?>index.php/Controller/Consulter">Consulter des produits</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url() ?>index.php/Controller/login">Login</a></li>
                <li><a href="<?php echo base_url() ?>index.php/Controller/Quitter">Quitter</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
</nav>