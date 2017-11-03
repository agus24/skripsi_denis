<div class="modal fade user-register-modal" id="userregisterModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="userregisterModalForm" action="{{ url('register') }}" method="POST">
            {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">Register account</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="user_email">Email</label>
                        <input type="email" id="user_email" name="user_email" required class="form-control" value="" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="user_password">Password</label>
                        <input type="password" id="user_password" required value="" name="user_password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="user_password">Retype password</label>
                        <input type="password" id="cuser_password" required value="" name="confirmation_password" class="form-control" placeholder="Retype password">
                    </div>
                    <div class="form-group">
                        <label for="user_password">Name</label>
                        <input type="text" id="name" required value="" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="user_password">Address</label>
                        <input type="text" id="address" required value="" name="address" class="form-control" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label for="user_password">City</label>
                        <input type="text" id="city" required value="" name="city" class="form-control" placeholder="city">
                    </div>
                    <div class="form-group">
                        <label for="user_password">Province</label>
                        <input type="text" id="province" required value="" name="province" class="form-control" placeholder="province">
                    </div>
                    <div class="form-group">
                        <label for="user_password">Zip Code</label>
                        <input type="text" id="zip_code" required value="" name="zip_code" class="form-control" placeholder="zip_code">
                    </div>
                    <div class="form-group">
                        <label for="user_password">Phone Number</label>
                        <input type="text" id="phone_number" required value="" name="phone_number" class="form-control" placeholder="phone_number">
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="user-login-modal-link pull-left">
                        <a data-rel="loginModal" href="#loginModal">Already have an account?</a>
                    </span>
                    <button type="submit" class="btn btn-default btn-outline">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
