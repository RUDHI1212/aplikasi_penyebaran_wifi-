<html>
<head>
    <title>CaGON</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
        font-family: Arial, Helvetica, sans-serif;
        background-image: url("http://localhost/cangon/assets/img/bg_hd.jpg");
    background-size: cover;
    background-position: center;
        background-attachment: fixed;
        background-repeat: no-repeat;
        margin: 0;
        padding: 0;
        }
        .box{
          width: 500px;
          padding: 40px;
          position: absolute;
          margin-top: 160px;
          margin-left: 380px;
          background:  #f5f4f4;
          text-align: center;
          opacity: 0.7;
          border-radius: 24px;
        }
        .box h1{
          color: black;
          text-transform: uppercase;
          font-weight: 500;
        }
        .box input[type = "text"],.box input[type = "password"]{
          border:0;
          background: none;
          display: block;
          margin: 20px auto;
          text-align: center;
          border: 2px solid #3498db;
          padding: 14px 10px;
          width: 200px;
          outline: none;
          color: black;
          border-radius: 24px;
          transition: 0.25s;
        }
        .box input[type = "text"]:focus,.box input[type = "password"]:focus{
          width: 280px;
          border-color: #2ecc71;
        }
        .box input[type = "submit"]{
          border:0;
          background: none;
          display: block;
          margin: 20px auto;
          text-align: center;
          border: 2px solid #2ecc71;
          padding: 14px 40px;
          outline: none;
          color: black;
          border-radius: 24px;
          transition: 0.25s;
          cursor: pointer;
        }
        .box input[type = "submit"]:hover{
          background: #2ecc71;
        }   
        .need-help
        {
            margin-top: 10px;
        }
        .new-account
        {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            
         <?php if(isset($error)) { echo $error; }; ?>
            <div>
                
                
                <form class="box" method="POST" action="http://localhost/cangon/auth/login">
                <h1 class="text-center"><b>CaGOn</b> | Login</h1>

                <br>

                <div class="form-group">
                    <input id="username" type="text" class="form-control" name="username" placeholder="Username Anda" autofocus required>
                </div>
                    
                <div class="form-group">
                    <input id="password" type="password" name="password" class="form-control" placeholder="Password Anda"  required>
                </div>

                <input class="btn btn-lg btn-primary btn-block" name="submit" id="btn-login" type="submit" href="" value="Masuk">

                </form>
               
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
</body>
</html>