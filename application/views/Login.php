<?php
/**
 * Created by PhpStorm.
 * User: 1494778
 * Date: 2016-03-11
 * Time: 09:48
 */ ?>
<script type="text/javascript">

    // Ajax post
    $(document).ready(function () {
        $(".submit").click(function (event) {
            event.preventDefault();
            var courriel = $("input#email").val();
            var password = $("input#pwd").val();
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "index.php/Controller/postLogin",
                dataType: 'json',
                data: {email: courriel, pwd: password}
            })
        });
    });
</script>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Connection</h4></div>
        <div class="panel-body">
            <form method="post" action="<?php echo base_url() ?>index.php/Controller/postLogin" role="form" class="form-horizontal">
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Courriel:</label>
                    <div class="col-sm-10">
                        <input name="email" type="email" class="form-control" placeholder="Courriel">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Mot de passe:</label>
                    <div class="col-sm-10">
                        <input name="pwd" type="password" class="form-control" placeholder="******">
                    </div>
                </div>
                <button type="submit" id="submit" class="btn btn-primary">Connection</button>
            </form>
        </div>
    </div>
</div>


