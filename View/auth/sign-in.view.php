<div class="header">
  <div class="title-name">
    <h2>Attendance Management System (A.M.S.)</h2>
  </div>


  <div class="main-container">

   <div class="signup-panel">
      <div class="signup-header">Sign Up</div>
      <form action="#" method="post">
        <div class="form-group">
          <label for="fname">
            <img src="<?= res('icons/user-blue.svg') ?>" alt="User Icon" class="icon" />
            Username
            <input type="text" name="username" id="username" />
          </label>
          <span class="error-msg"></span>
        </div>


        <div class="form-group">
          <label for="password1">
            <img src="<?= res('icons/key-blue.svg') ?>" alt="Password Icon" class="icon" />
            Password
            <input type="password" name="password1" id="password1" />
          </label>
          <span class="error-msg">Incorrect password</span>
        </div>

        <div class="terms-checkbox">
          <a href="#">Forgot Password?</a>
        </div>

        <div class="submit-button">
          <button type="submit">Sign Up</button>
        </div>

      </form>
    </div>

    <div class="option-panel">
      <div class="welcome-message">Welcome</div>
      <div class="user-check">Not a User?</div>
      <div class="login-link">
        <a href="/sign-up">Sign Up</a>
      </div>
    </div>
    
  </div>
</div>