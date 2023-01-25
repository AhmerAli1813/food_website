
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
        
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Hide this modal and show the first with the button below.
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
        </div>
      </div>
    </div>
    </div>
    <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle2" role="button">Open first modal</a>
<?php
include "../database/conf.php";    
$q=$conn->query("SELECT * FROM `colors`") or die("failde");
if($q){
      while($row = mysqli_fetch_assoc($q)){
      echo  '<a class="dropdown-item color-item '.$row["clr_sts"].' "  data-color-sts = "'.$row["clr_sts"].'" data-color="'.$row["clr"].'"; data-hsl="'.$row["hsl"].'" data-color-alt="'.$row["color_alt"]
      .'" data-color-lighter="'.$row["color_lighter"].'" data-hsl="340" style="--clr:'.$row["clr"].';" href="#">
            </a>';
}
} 

?>  
  <img src="../database//upload/" alt="">
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" ></script>
</body>

</html>

  
  