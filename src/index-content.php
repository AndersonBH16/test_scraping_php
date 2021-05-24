<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="form">            
            <div class="card mt-4">
                <div class="card-body">
                    <form method="POST" action="scraping_content.php">
                        <div class="text-center p-3">
                            <h4 class="text-info">Scraping with PHP - Get Content</h4>
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">URL:</span>
                            </div>
                            <input type="text" class="form-control" name="url" placeholder="Insert Link" aria-label="Username">
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Tag Name:</span>
                            </div>
                            <input type="text" class="form-control col-lg-2" name="tag_name" placeholder="Insert Tag" aria-label="Username">
                        </div>
                        <div class="mt-3 text-center">
                            <input type="submit" value="Scrape!" class="btn btn-info">
                        </div>
                    </form>
                </div>
            </div>
        </div>       
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>