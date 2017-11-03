<div class="modal fade user-login-modal" id="userloginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="userloginModalForm" action="{{ url('login') }}" method="POST">
            {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email" name="email" required class="form-control" value="" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" required value="" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="user-login-modal-register pull-left">
                        <a data-rel="registerModal" href="#">Not a Member yet?</a>
                    </span>
                    <button type="submit" class="btn btn-default btn-outline">Sign in</button>
                </div>
            </form>
        </div>
    </div>
</div>
