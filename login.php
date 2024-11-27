<?php
function al($msg){
    echo "<script type=\"text/javascript\">alert('$msg') </script>";
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <link rel="shortcut icon" type="x-icon" href="wattano.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.login.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">

</head>

<script 
    type="text/javascript">
        function noBack(){
            window.history.forward()
        }
            
        noBack();
        window.onload = noBack;
        window.onpageshow = function(evt) { if (evt.persisted) noBack() }
        window.onunload = function() { void (0) }
</script>
<body>
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="img/wattano.png" class="img-fluid" alt="image" height="300px" width="600px">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form action="checklogin.php" method="post">
            <br>
            <h1 class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">ยินดีต้อนรับ </h1>
            </br>
            <div class="form-outline mb-4">
              <label class="form-label" for="form1Example13"> รหัสประจำตัวนักเรียน</label>
              <input type="text" required name="Username" oninvalid="setCustomValidity('โปรดกรอกรหัสประจำตัวนักเรียน')" oninput="setCustomValidity('')" class="form-control form-control-lg py-3" name="Username" placeholder="   โปรดกรอกรหัสประจำตัวนักเรียน" style="font-size: 100%; border-radius: 25px ;"
/>
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="form1Example23"> รหัสผ่าน</label>
              <input type="password" required name="Password" oninvalid="setCustomValidity('โปรดกรอกรหัสผ่าน')" oninput="setCustomValidity('')" class="form-control form-control-lg py-3" name="Password"  placeholder="   โปรดกรอกรหัสผ่าน" style="font-size:100%; border-radius:25px ;" />

            </div>

            <button type="submit" class="button" style="border-radius: 15px;" id="loginButton">ล็อกอิน</button>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  </form>
</body>

</html>