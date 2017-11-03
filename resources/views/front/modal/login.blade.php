<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        <form onsubmit="login(event,this)" id="formLogin">
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('#formLogin').submit()">Login</button>
      </div>
    </div>

  </div>
</div>
