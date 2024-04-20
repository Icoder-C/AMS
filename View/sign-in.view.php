<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign In | A.M.S.</title>
  <!-- <script src="https://kit.fontawesome.com/aefb516b65.js" crossorigin="anonymous"></script> -->
  <!-- <link rel="stylesheet" href="./styles.css" /> -->
  <link rel="stylesheet" href="<?= css("reset") ?>">
  <link rel="stylesheet" href="<?= css("variables") ?>">
  <link rel="stylesheet" href="<?= css("font") ?>">
  <link rel="stylesheet" href="<?= css("signIn") ?>">
</head>

<body>
  <div class="header">
    <!-- <div class="logo" > -->
    <!-- <img src="./../resources/logo.png" class="logo" /> -->
    <!-- </div> -->
    <div class="title-name">
      <h2>Attendance Management System (A.M.S.)</h2>
    </div>
  </div>
  <div class="main-container">
    <div class="detailsPanel">
      <div class="topic">
        <h3>Sign In</h3>
      </div>

      <form action="login.php" method="post" novalidate>
        <div class="labels">
          <label for="username">
            <img src="./../resources/user-blue.svg" class="icon" /> Username
            <input type="text" name="username" id="username" placeholder="Username" /> </label><span
            class="error-msg"></span>
        </div>

        <div class="input">
          <label for="password">
            <div class="icon">
              <img src="./../resources/key-blue.svg" class="icon" />
            </div>
            Password
            <input type="text" name="password" id="password" placeholder="**********" />
          </label><span class="error-msg"></span>
        </div>

        <div class="link">
          <a href="#">Forgot Password?</a>
        </div>

        <div class="sign_in">
          <button type="submit">Sign In</button>
        </div>
      </form>
    </div>

    <div class="optionPanel">
      <div class="big-text">Welcome</div>
      <div class="small-text">Not a User?</div>
      <a href="./signup/signup.html" class="sign_up">Sign Up</a>
    </div>
  </div>
</body>
</html>