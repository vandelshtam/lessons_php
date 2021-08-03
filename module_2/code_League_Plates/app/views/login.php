<?php $this->layout('layout', ['title' => 'User Profile']) ?>
<?= flash()->display();?>
<h1>Login</h1>
<p>Hello, <?=$this->e($name);?></p>


<form class="row g-3 needs-validation" novalidate method="POST">
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Password</label>
    <input type="password" class="form-control" id="validationCustom01" name='password' value="Mark" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Email</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input type="text" class="form-control" id="validationCustomUsername" name="email" aria-describedby="inputGroupPrepend" required>
      <div class="invalid-feedback">
        Please choose a email.
      </div>
    </div>
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>

<?php d($_POST);?>