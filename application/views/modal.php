<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="<?= base_url('Auth/login'); ?>">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="username" id="floatingInput" required placeholder="username">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password" id="floatingInput" required placeholder="Password">
            <label for="floatingInput">Password</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <input type="submit" class="btn btn-primary" value="Login">
        </div>
      </form>
    </div>
  </div>
</div>