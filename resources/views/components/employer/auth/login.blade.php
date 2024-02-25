<div class="col-lg-12 mt-5 col-sm-6 wow fadeInUp flex " data-wow-delay="0.1s"
     style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
    <span class="cat-item rounded p-4 w-25 m-auto">
        <h3 class="mb-3">Employer Login Area</h3>
        <form id="loginForm">
            <div class="row g-3">
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                        <label for="email">Your Email</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" placeholder="Password">
                        <label for="subject">Password</label>
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" onclick="submitForm(event)" type="submit">Login</button>
                </div>
            </div>
        </form>
        <a href="/system-admin/forgot-password">Forgot Password?</a>
        <!-- resources/views/auth/login.blade.php -->

{{--<a href="">Login with Google</a>--}}
        <form class="text-center" action="{{ route('login.google') }}">
            <button class="gsi-material-button">
  <div class="gsi-material-button-state"></div>
  <div class="gsi-material-button-content-wrapper">
    <div class="gsi-material-button-icon">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
           xmlns:xlink="http://www.w3.org/1999/xlink" style="display: block;">
        <path fill="#EA4335"
              d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
        <path fill="#4285F4"
              d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
        <path fill="#FBBC05"
              d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
        <path fill="#34A853"
              d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
        <path fill="none" d="M0 0h48v48H0z"></path>
      </svg>
    </div>
    <span class="gsi-material-button-contents">Sign in with Google</span>
    <span style="display: none;">Sign in with Google</span>
  </div>
</button>
        </form>

    </span>
</div>


<script>
    async function submitForm(event) {
        event.preventDefault(); // Prevents the default form submission

        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        if (email.length === 0) {
            errorToast("Email is required");
        } else if (password.length === 0) {
            errorToast("Password is required");
        } else {
            showLoader();
            let res = await axios.post("/system-admin-login", {email: email, password: password});
            hideLoader()
            if (res.status === 200 && res.data['status'] === 'success') {
                window.location.href = "/system-admin";
            } else {
                errorToast(res.data['message']);
            }
        }


    }
</script>
