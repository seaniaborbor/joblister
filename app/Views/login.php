
<?=$this->extend('partials/layout')?>



<?=$this->section('main')?>

<div class="row">
    <div class="col-md-4 offset-md-4" >
    <form action="<?=base_url('login')?>" method="post" class="text-center">
        <div class="row mt-5">
            <div class="col-6 offset-3">
            <img class="mb-4 w-100" src="<?=base_url('assets/brand/logo.png')?>" alt="">
            </div>
        </div>
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating ">
        <input type="email" value="" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
        </div>
        <?php if(isset($validation) && $validation->hasError('email')) : ?>
            <div class="text-danger text-left"><?=$validation->getError('email')?></div>
        <?php endif ?>
        <div class="form-floating mt-4">
        <input type="password" value="" class="form-control" name="password" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
        </div>
        <?php if(isset($validation) && $validation->hasError('password')) : ?>
            <div class="text-danger text-left"><?=$validation->getError('password')?></div>
        <?php endif ?>

        <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
        </div>

       
        <button class="w-100 btn btn-lg bg-purple text-white" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </form>
    </div>
</div>

<?=$this->endSection()?>