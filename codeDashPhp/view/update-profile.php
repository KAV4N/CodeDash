
<main class="mb-auto container-xxl bd-gutter my-5" id="main-container">
    <section class="d-flex flex-column rounded-3 gap-1">
        <div class="p-3 shadow-lg rounded-3 bg-body-tertiary text-light align-items-center justify-content-center">
            <h2>Player Profile Settings</h2>
            <form action="../public/index.php?section=update-profile" method="POST" id="profile-form">
                <input type="hidden" name="action" value="save">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="username" name="username" value='<?php echo $this->attributes["username"]; ?>' minlength="3">
                    </div>
                </div>
                <hr>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <p class="form-control rounded" id="email" name="email"><?php echo $this->attributes["email"]; ?></p>
                    </div>
                </div>
                <hr>
                <div class="mb-3 justify-content-between d-flex">
                    <label for="change-password-btn" class="form-label">Password</label>
                    <button class="btn btn-outline-light" type="button" id="change-password-btn">Change Password</button>
                </div>
                <hr>
                <div id="password-fields" style="display: none;">
                    <div class="mb-3">
                        <label for="current-password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="current-password" name="current_password">
                    </div>
                    <div class="mb-3">
                        <label for="new-password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="new-password" name="new_password">
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="confirm-password" name="confirm_password">
                    </div>
                    <hr>
                </div>
                <div class="mb-3">
                    <label for="about-me" class="form-label">About Me</label>
                    <textarea class="form-control" id="about-me" name="aboutme" maxlength="250"><?php echo $this->attributes["aboutme"]; ?></textarea>
                </div>
                
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Profile</button>
                </div>
            </form>
            <p class="text-danger"><?php echo $this->attributes["error"]; ?></p>
            <p class="text-success"><?php echo $this->attributes["success"]; ?></p>
        </div>
    </section>
</main>

<!-- Delete Confirmation Modal -->


<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

<script>
    document.getElementById('change-password-btn').addEventListener('click', function() {
        var passwordFields = document.getElementById('password-fields');
        var currentPassword = document.getElementById('current-password').value;
        var newPassword = document.getElementById('new-password').value;
        var confirmPassword = document.getElementById('confirm-password').value;

        if (newPassword !== '' || confirmPassword !== '' || currentPassword !== '') {
            return;
        }
        passwordFields.style.display = passwordFields.style.display === 'none' ? 'block' : 'none';
    });
</script>

