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
                    3.1. Count of all active and verified users
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Count of all active and verified users :</h5>
                        <p class="card-text"><?php echo $countOfActiveUsers ; ?></p>                        
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                    3.2. Count of active and verified users who have attached active products
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Count of active and verified users who have attached active products :</h5>
                        <p class="card-text"><?php echo $countOfActiveUsersOfAttachedActiveProducts ; ?></p>                        
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                    3.3. Count of all active products
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Count of all active products :</h5>
                        <p class="card-text"><?php echo $activeProductsCount ; ?></p>                        
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                    3.4. Count of active products which don't belong to any user
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Count of active products which don't belong to any user :</h5>
                        <p class="card-text"><?php echo $activeProductsNotBelongsToUser ; ?></p>                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>