<?php
if(isset($_POST['submit']))
  $username = $_POST["username"]
  $filename = 'myFile.txt';

  // Open the file in write mode
  $file = fopen($filename, 'w');

    // Write the text to the file
    fwrite($file, $text);

    // Close the file
    fclose($file);

$apikey = getenv("APIKEY");
$authdomain = getenv("AUTHDOMAIN");
$projectid = getenv("PROJECTID");
$storagebucket = getenv("STORAGEBUCKET");
$messagingsenderid = getenv("MESSAGINGSENDERID");
$appid = getenv("APPID");
$measurementid = getenv("MEASUREMENTID");
?>

<html>
  <head>
    <title>Scales Together</title>

    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="twitter:title" content="Scales Together">
    <meta name="twitter:description" content="Scales Together is an easy to use social media site where only content that may be relevant to you is shown.">
    <meta name="keywords" content="SocialMedia, EasyToUse">
    <meta name="twitter:image" content="Profile Picture.png">
    <script type="text/javascript" src="script.js"></script>
  </head>
  <body>
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="Login.php" class="active">Login</a></li>
  <li><a href="Register.php">Register</a></li>
  <li><a href="About.php" style="float: right">About</a></li>
</ul>
    
    <h1>Welcome back</h1>
    <form id="loginform" method="post">
      <div class="LoginDetails">
        <p>
          Username: <input type="text" id="username" name="username"/>
        </p>
        <p>
          Email: <input type="email" id="email" name="email"/>
        </p>
        <p>
          Password: <input type="password" id="password" name="password"/>
        </p>
      </div>
      <button type="submit" class="PrimaryButton" name="submit">Login</button>
      <button type="button" class="PrimaryButton">Forgot password</button>
    </form>
  </body>

  <script type="module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.22.0/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.22.0/firebase-analytics.js";
    import { getAuth, signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/9.22.0/firebase-auth.js";

    const firebaseConfig = {
      apiKey: '<?php echo $apikey; ?>',
      authDomain: '<?php echo $authdomain; ?>',
      projectId: '<?php echo $projectid; ?>',
      storageBucket: '<?php echo $storagebucket; ?>',
      messagingSenderId: '<?php echo $messagingsenderid; ?>',
      appId: '<?php echo $appid; ?>',
      measurementId: '<?php echo $measurementid; ?>'
    };
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
    const auth = getAuth(app);

   const signinForm = document.getElementById('loginform');
    signinForm.addEventListener('submit', (event) => {
      event.preventDefault();
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;

// ...

  createUserWithEmailAndPassword(auth, email, password)
    .then((userCredential) => {
      // User created account successfully
      const user = userCredential.user;
  
      // Send email verification
      user.sendEmailVerification()
        .then(() => {
          // Email verification sent
          console.log('Email verification sent to:', user.email);
          alert("An email has been sent to ", user.email, "! If you cannot find the email, check your spam/junk folder.");
        })
        .catch((error) => {
          // Error sending email verification
          console.log('Error sending email verification:', error);
        });
    })
    .catch((error) => {
      // Handle account creation error
      console.log('Account creation error:', error);
    });
  
      });
</script>
</html>