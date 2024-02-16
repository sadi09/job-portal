<div class="col-lg-12 mt-5 col-sm-6 wow fadeInUp flex " data-wow-delay="0.1s"
     style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
    <span class="cat-item rounded p-4 w-25 m-auto">
        <h3 class="mb-3">Admin Login Area</h3>
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
