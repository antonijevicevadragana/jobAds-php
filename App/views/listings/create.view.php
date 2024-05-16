<?php
loadPartials('head');
loadPartials('nav');
?>




<section class="formContainer">
    <div class="content">
        <div class="row justify-content-center frame">
    <h1 class="text-center">POST JOB </h1>
    <hr>
            <form method="POST" action="/listings">
                <h2 class="text-center">About company</h2>
                <div class="input-box">
                    <label for="company" class="col-form-label text-md-end">Company Name</label>
                    <input type="text" class="form-control" name="company" value="" autofocus placeholder="&#xf1ad;" style="font-family: Arial, FontAwesome">
                </div>
                <div class="input-box">
                    <label for="city" class="col-form-label text-md-end">City</label>
                    <input type="text" class="form-control" name="city" value="" autofocus placeholder="&#xf3c5;" style="font-family: Arial, FontAwesome">
                </div>
                <div class="input-box">
                    <label for="state" class="col-form-label text-md-end">State</label>
                    <input type="text" class="form-control" name="state" value="" autofocus placeholder="&#xf3c5;" style="font-family: Arial, FontAwesome">
                </div>
                <div class="input-box">
                    <label for="address" class="col-form-label text-md-end">Address</label>
                    <input type="text" class="form-control" name="address" value="" autofocus placeholder="&#xf3c5;" style="font-family: Arial, FontAwesome">
                </div>
                <div class="input-box">
                    <label for="text" class="col-form-label text-md-end">Phone number</label>
                    <input type="phone" class="form-control" name="phone" value="" autofocus placeholder="&#xf2a0;" style="font-family: Arial, FontAwesome">
                </div>
                <div class="input-box">
                    <label for="email" class="col-form-label text-md-end">E-mail</label>
                    <input type="email" class="form-control" name="email" value="" autofocus placeholder="&#xf0e0;" style="font-family: Arial, FontAwesome">
                </div>

                <h2 class="text-center mt-5">About job position</h2>


                <div class="input-box mb-5">
                    <label for="title" class=" col-form-label text-md-end">Job Title</label>
                    <input type="text" class="form-control" name="title" placeholder="&#xf044;" style="font-family: Arial, FontAwesome">
                </div>

                <textarea name="role_summary"  rows="10"  class="custom-textarea" style="background-color: transparent; color:white; border: 2px solid rgba(255, 255, 255, 0.2); border-radius: 30px;" placeholder="Role Summary"></textarea>




                <textarea name="description"  rows="10"class="custom-textarea" style="background-color: transparent; color:white;  border: 2px solid rgba(255, 255, 255, 0.2);
  border-radius: 30px;" placeholder="Job Description"></textarea>


                <textarea name="requirements" rows="10" class="custom-textarea" style="background-color: transparent; color:white;  border: 2px solid rgba(255, 255, 255, 0.2);
  border-radius: 30px;" placeholder="Requirements"></textarea>



                <textarea name="benefits"  rows="10" class="custom-textarea" style="background-color: transparent; color:white;  border: 2px solid rgba(255, 255, 255, 0.2);
  border-radius: 30px;" placeholder="Benefits"></textarea>


                <div class="input-box">
                    <label for="tags" class="col-form-label text-md-end">Tags</label>
                    <input type="text" class="form-control" name="tags" placeholder="&#xf02c;" style="font-family: Arial, FontAwesome">
                </div>

                <div class="input-box">
                    <label for="work_location" class="col-form-label text-md-end">Work Location</label>
                    <input type="text" class="form-control" name="work_location" placeholder="&#xf3c5; remote, hybrid or on-site" style="font-family: Arial, FontAwesome">
                </div>

                <div class="d-grid gap-2">
                    <br>
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