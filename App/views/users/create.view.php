<?php
loadPartials('head');
loadPartials('nav');
?>
<section class="formContainer login">
    <div class="content">
        <div class="row justify-content-center frame">
            <h1 class="text-center">Register</h1>
            <hr>
            <form method="POST" action="">
            <div class="input-box">
                    <input type="text" class="form-control" name="name" value="" placeholder="&#xf007; Name" style="font-family: Arial, FontAwesome">
                </div>
            <div class="input-box">
                    <input type="email" class="form-control" name="email" value="" placeholder="&#xf0e0; Email" style="font-family: Arial, FontAwesome">
                </div>
             
                <div class="input-box">
                    <input type="password" class="form-control" name="password" value="" placeholder="&#xf023; Password" style="font-family: Arial, FontAwesome">
                </div>

                <div class="input-box">
                    <input type="password" class="form-control" name="con_password" value="" placeholder="&#xf023; Confirm Password" style="font-family: Arial, FontAwesome">
                </div>
                <div class="input-box">
                    <input type="text" class="form-control" name="state" value="" placeholder="&#xf3c5; State" style="font-family: Arial, FontAwesome">
                </div>

                <div class="input-box">
                    <input type="text" class="form-control" name="city" value="" placeholder="&#xf3c5; City" style="font-family: Arial, FontAwesome">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn formSubmit">
                        Sumbit
                    </button>
                </div>
                <p class="pt-3">Already have account? <a href="/auth/login">Login</a></p>
            </form>
        </div>
    </div>
</section>

<?php
loadPartials('footer');

?>