<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign UP | A.M.S.</title>
  <link rel="stylesheet" href="./styles.css" />
  <script src="https://kit.fontawesome.com/aefb516b65.js" crossoSrigin="anonymous"></script>
  <!-- <link rel="stylesheet" href="../Styles/login.css"> -->
  <link rel="stylesheet" href="<?= css("reset") ?>">
  <link rel="stylesheet" href="<?= css("signUp") ?>">
</head>

<body>
  <div class="header">
    <img src="./../../resources/logo.png" class="logo" />
    <div class="title-name">
      <h2>Attendance Management System (A.M.S.)</h2>
    </div>
  </div>

  <div class="main-container">
    <div class="optionPanel">
      <div class="big-text">Welcome</div>
      <div class="small-text">Already a User?</div>
      <div class="sign_up">
        <a href="/sign-in">Sign In</a>
      </div>
    </div>

    <div class="detailsPanel">
      <div class="topic">Sign Up</div>
      <form action="#" method="post">
        <div class="input">
          <label for="fname">
            <img src="./../../resources/user-blue.svg" alt="user" class="icon" />
            Full Name
            <input type="text" name="fname" id="fname" placeholder="First-Name last-Name" /> </label><span
            class="error-msg"></span>
        </div>

        <div class="input">
          <label for="email">
            <img src="./../../resources/email-blue.svg" alt="email" class="icon" />
            Email
            <input type="email" name="email" id="email" placeholder="xyz@gmail.com" /> </label><span
            class="error-msg"></span>
        </div>

        <div class="input">
          <label for="appointment">
            <img src="./../../resources/calendar-blue.svg" alt="DOA" class="icon" />
            Date of Appointment
            <input type="date" name="appointment" id="appointment" placeholder="dd/mm/yyyy" /> </label><span
            class="error-msg"></span>
        </div>

        <div class="input">
          <label for="password">
            <img src="./../../resources/key-blue.svg" alt="password" class="icon" />
            Password
            <input type="text" name="password" id="password" placeholder="**********" /> </label><span
            class="error-msg"></span>
        </div>

        <div class="input">
          <label for="password">
            <img src="./../../resources/key-blue.svg" alt="cpassword" class="icon" />
            Confirm Password
            <input type="text" name="password" id="password" placeholder="**********" /> </label><span
            class="error-msg"></span>
        </div>
        <label for="terms" class="terms">
        <input type="checkbox" name="terms" id="terms" required /> I have read all <a href="./terms_&_Condition.html">Terms & Conditions.</a>
      </label>

        <div class="sign_in">
          <button type="submit">Sign In</button>
        </div>

      </form>
    </div>
  </div>
</body>

</html>