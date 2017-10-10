<?php 

    $email = $_POST['email'];
    $pwd = $_POST['password'];

?>
<div class="container">
    <div class="row">
        <div class="page-header col-sm-6 col-sm-offset-3">    
            <h1 class="animated zoomInLeft text-center titre text-uppercase">Connection</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 formulaireCo">
            <form method="post" role="form">
                <div class="form-group float-label-control">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group float-label-control">
                    <label for="password">Password</label>
                    <input name="password" id="password" type="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-md btn-success pull-right">
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Latest compiled and minified JS -->
<script src="//code.jquery.com/jquery.js"></script>

<script src="assets/js/connection.js"></script>