<div class="header">
  <div class="title-name">
    <h2>Attendance Management System (A.M.S.)</h2>
  </div>

  <div class="main-container">
    <div class="option-panel">
      <div class="welcome-message">Welcome</div>
      <div class="user-check">Already a User?</div>
      <div class="login-link">
        <a href="/sign-in">Sign In</a>
      </div>
    </div>

    <div class="signup-panel">
      <div class="signup-header">Sign Up</div>
      <form action="#" method="post">
        <div class="form-group">
          <label for="fname">
            <img src="<?= res('icons/user-blue.svg') ?>" alt="User Icon" class="icon" />
            Full Name
            <input type="text" name="fname" id="fname" placeholder="Full Name" />
          </label>
          <span class="error-msg"></span>
        </div>

        <div class="form-group">
          <label for="email">
            <img src="<?= res('icons/email-blue.svg') ?>" alt="Email Icon" class="icon" />
            Email
            <input type="email" name="email" id="email" placeholder="emailme@gmail.com" />
          </label>
          <span class="error-msg"></span>
        </div>

        <div class="form-group">
          <label for="appointment">
            <img src="<?= res('icons/calendar-blue.svg') ?>" alt="Calendar Icon" class="icon" />
            Date of Appointment
            <input type="date" name="appointment" id="appointment" placeholder="dd/mm/yyyy" />
          </label>
          <span class="error-msg"></span>
        </div>

        <div class="form-group">
          <label for="password1">
            <img src="<?= res('icons/key-blue.svg') ?>" alt="Password Icon" class="icon" />
            Password
            <input type="password" name="password1" id="password1" placeholder="**********" />
          </label>
          <span class="error-msg">Incorrect password</span>
        </div>

        <div class="form-group">
          <label for="password2">
            <img src="<?= res('icons/key-blue.svg') ?>" alt="Confirm Password Icon" class="icon" />
            Confirm Password
            <input type="password" name="password2" id="password2" placeholder="**********" />
          </label>
          <span class="error-msg">Incorrect password</span>
        </div>


        <label for="terms" class="terms-checkbox">
          <input type="checkbox" name="terms" id="terms" required />
          I have read all <a href="./terms_&_Condition.html"> Terms & Conditions</a>.
        </label>


        <div class="submit-button">
          <button type="submit">Sign Up</button>
        </div>
      </form>
    </div>
  </div>
</div>