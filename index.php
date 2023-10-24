<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link>
  <title>Login</title>
</head>
<body style="background-color: #1f2349;">
  <!-- login -->
  <section class="h-100 w-60 gradient-custom">
    <div class="container py-5 h-100 w-60">
      <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-6">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
        <div class="card-body mx-5 text-center">
          <h2 class="fw-bold mb-1 text-uppercase">Login</h2>
          <br>
          <div class="form-outline form-white mb-4">
              <input type="text" id="ipTextField" class="form-control form-control-lg" placeholder="IP address" />
          </div>
          <div class="form-outline form-white mb-4 d-flex">
              <div style="margin-right: 3%">
                  <input type="text" id="portTextField" class="form-control form-control-lg" placeholder="Port"/>
              </div>
              <div style="margin-left: 1%">
                  <input type="text" id="dbNameTextField" class="form-control form-control-lg" placeholder="Database name"/>
              </div>
          </div>
          <div class="form-outline form-white mb-4">
              <input type="text" id="userTextField" class="form-control form-control-lg" placeholder="User"/>
          </div>
          <div class="form-outline form-white mb-4">
              <input type="password" id="passwordField" class="form-control form-control-lg" placeholder="Password" />
          </div>
          <div class="form-outline form-white mb-4">
              <select id="comboServer" class="form-control form-control-lg">
                  <option value="Apache">Apache</option>
                  <option value="Tomcat">Tomcat</option>    
              </select>
          </div>
          <button id="loginButton" class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
        </div>
        </div>
      </div>
      </div>
    </div>
  </section>
  <script src="js/script.js"> </script>
</body>
</html>