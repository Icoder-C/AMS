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
      <form action="/sign-up" method="post" novalidate>
        <div class="form-group">
          <label for="fname">
            <img src="<?= res('icons/user-blue.svg') ?>" alt="User Icon" class="icon" />
            Full Name
            <input type="text" name="fname" id="fname" placeholder="Full Name" value="<?= $_POST['fname'] ?? ''; ?>"/>
          </label><span class="error-msg">
          <?php if (isset($errors['fname'])): ?>
          <?= $errors['fname']?>
          <?php endif; ?></span>
        </div>

        <div class="form-group">
          <label for="email">
            <img src="<?= res('icons/email-blue.svg') ?>" alt="Email Icon" class="icon" />
            Email
            <input type="email" name="email" id="email" placeholder="emailme@gmail.com" value="<?= $_POST['email'] ?? ''; ?>"/>
          </label><span class="error-msg">
          <?php if (isset($errors['email'])): ?>
          <?= $errors['email']?>
          <?php endif; ?></span>
        </div>

        <div class="form-group">
          <label for="phone">
            <img src="<?= res('icons/phone-blue.svg') ?>" alt="Phone Icon" class="icon" />
            Phone Number
            <input type="text" name="phone" id="phone" placeholder="982369402" value="<?= $_POST['phone'] ?? ''; ?>"/>
          </label><span class="error-msg">
          <?php if (isset($errors['phone'])): ?>
          <?= $errors['phone']?>
          <?php endif; ?></span>
        </div>

        <div class="form-group">
          <label for="appointment">
            <img src="<?= res('icons/calendar-blue.svg') ?>" alt="Calendar Icon" class="icon" />
            Date of Appointment
            <input type="date" name="doa" id="doa" placeholder="dd/mm/yyyy" value="<?= $_POST['doa'] ?? ''; ?>"/>
          </label><span class="error-msg">
          <?php if (isset($errors['doa'])): ?>
          <?= $errors['doa']?>
          <?php endif; ?></span>
        </div>

        <div class="form-group">
          <label for="password">
            <img src="<?= res('icons/key-blue.svg') ?>" alt="Password Icon" class="icon" />
            Password
            <input type="password" name="password" id="password" placeholder="**********" />
          </label><span class="error-msg">
          <?php if (isset($errors['password'])): ?>
          <?= $errors['password']?>
          <?php endif; ?></span>
        </div>

        <div class="form-group">
          <label for="cpassword">
            <img src="<?= res('icons/key-blue.svg') ?>" alt="Confirm Password Icon" class="icon" />
            Confirm Password
            <input type="password" name="cpassword" id="cpassword" placeholder="**********" />
          </label><span class="error-msg">
          <?php if (isset($errors['cpassword'])): ?>
          <?= $errors['cpassword']?>>
          <?php endif; ?></span
        </div>

        <label for="terms" class="terms-checkbox">
          <input type="checkbox" name="terms" id="terms" required checked/>
          I have read all <a href="./terms_&_Condition.html"> Terms & Conditions</a>.
        </label>

        <div class="submit-button">
          <button type="submit">Sign Up</button>
        </div>
      </form>
    </div>
  </div>
</div>