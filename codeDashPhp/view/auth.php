<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-body-tertiary">
                    <h5 class="card-title">Please Login To Continue</h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="loginTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Log In</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="signup-tab" data-bs-toggle="tab" href="#signup" role="tab" aria-controls="signup" aria-selected="false">Sign Up</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3">
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                            <form id="loginForm" method="post" action="../public/index.php?section=auth">
                                <input type="hidden" name="action" value="login">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 my-3">Log In</button>
                            </form>
                            <p class="text-danger"><?php if (isset($this->attributes["error"])){ echo $this->attributes["error"]; }?></p>
                        </div>
                        <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
                            <form id="signupForm" method="post" action="../public/index.php?section=auth">
                                <input type="hidden" name="action" value="register">
                                <div class="mb-3">
                                    <label for="newEmail" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="newEmail" placeholder="Enter your email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="newUsername" class="form-label">New Username</label>
                                    <input type="text" name="username" class="form-control" id="newUsername" placeholder="Enter your new username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <input type="password" name="password" class="form-control" id="newPassword" placeholder="Enter your new password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Confirm your password" required>
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="consentCheckbox" required>
                                    <label class="form-check-label" for="consentCheckbox">
                                        I agree to the processing of my personal data
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-success w-100 my-3">Sign Up</button>
                            </form>
                            <p class="text-danger"><?php if (isset($this->attributes["error"])){ echo $this->attributes["error"]; }?></p>
                        </div>
                    </div>
                    <hr class="my-3">
<!--                     <div class="d-flex flex-column align-items-center mb-3">
                        <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
                        <div class="g-signin2" data-onsuccess="onSignIn" style="width: 300px;"></div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
