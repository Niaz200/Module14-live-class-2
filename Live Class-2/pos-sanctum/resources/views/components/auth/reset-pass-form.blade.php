<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6 center-screen">
            <div class="card animated fadeIn w-90 p-4">
                <div class="card-body">
                    <h4>SET NEW PASSWORD</h4>
                    <br/>
                    <label>New Password</label>
                    <input id="password" placeholder="New Password" class="form-control" type="password"/>
                    <br/>
                    <label>Confirm Password</label>
                    <input id="cpassword" placeholder="Confirm Password" class="form-control" type="password"/>
                    <br/>
                    <button onclick="ResetPass()" class="btn w-100 bg-gradient-primary">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
  async function ResetPass() {
    //   let postBody={"password":document.getElementById('password').value}
      let password = document.getElementById('password').value;
      let cpassword = document.getElementById('cpassword').value;

       // Perform client-side validation
       if (password.length === 0) {
            errorToast("Password is required");
          return;
      }
      if (cpassword.length === 0) {
            errorToast("Confirm password is required");
          return;
      }
      if (password !== cpassword) {
            errorToast("Passwords do not match");
          return;
      }


        // Create the post body to be sent
        let postBody = { "password": password, "password_confirmation": cpassword };

      showLoader();
      let res=await axios.post("/reset-password",postBody,HeaderToken());
      hideLoader()

      if(res.status===200 && res.data['status']==='success'){
          window.location.href="/userProfile";
      }
      else{
          errorToast(res.data['message']);
      }

    }
</script>