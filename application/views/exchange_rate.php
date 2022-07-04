<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                    <h4> Exchange Rate </h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Exchange Rate Of 1 EUR is :</h5>
                        <p class="card-text"><?php echo $ron_rates ." RON"; ?></p>
                        <p class="card-text"><?php echo $usd_rates ." USD"; ?></p>                          
                    </div>
                </div>

                


            </div>
        </div>

    </div>
</body>
</html>