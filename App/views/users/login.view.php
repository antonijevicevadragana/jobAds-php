<?php
loadPartials('head');
loadPartials('nav');
?>
<section class="formContainer login">
    <div class="content">
        <div class="row justify-content-center frame">
            <h1 class="text-center">LogIn </h1>
            <hr>
            <form method="POST" action="">
                <div class="input-box">
                    <input type="email" class="form-control" name="email" value="" placeholder="&#xf0e0; Email Address" style="font-family: Arial, FontAwesome">
                </div>
             
                <div class="input-box">
                    <input type="password" class="form-control" name="password" value="" placeholder="&#xf023; Password" style="font-family: Arial, FontAwesome">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn formSubmit">
                        Sumbit
                    </button>
                </div>

            </form>
        </div>
    </div>
</section>

<?php
loadPartials('footer');

?>