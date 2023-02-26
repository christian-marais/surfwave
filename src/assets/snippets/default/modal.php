<div class="container ">
    <div class="row ">
        <div class="col-4 " style='margin:auto;'>
        <h1>Menu de login</h1>
        <p class="text-center">
          <span class="message">
            <?=(!empty($_POST['message']))?$_POST['message']:"";?>
          </span>
        </p>
        <form method="POST" action="<?=HTTPS?>://<?=$_SERVER['HTTP_HOST']?>/utilisateurs/login" class="">
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="text" class="form-control" name="mail_user" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <input  name="validate" type="submit" class="btn btn-primary"></input>
        </form>
        <p></p>
        </div>
    </div>
</div>