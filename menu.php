<?php

    require_once "./controlador.php"
    
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-image:url("");
            background-repeat: repeat;
        }
        h1 { 
            color: black;
        }

        .grid-fluid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        grid-gap: 1rem;
        grid-auto-rows: minmax(100px, auto);
        align-self: center;
    }
    .card {
        margin: 2rem auto;
        border:none;
        border-radius: 10px;
        box-shadow: 0 2px 9px 0 rgba(0, 0, 0, 0.1);
    }
    .card:hover {
        box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.4);
    }
    .card-text {
        font-size: 1.2rem;
        color: rgb(82, 82, 100);
    }

    </style>

   
</head>
<body>


        <div class="tittle text-center">
		    <h1>MENÚ</h1>
        </div>
	
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="menu.php">NameRestaurant</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="menu.php">Menú</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./logout.php">logout</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorias
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="menu.php?categoria=Hamburguesas">Hamburguesas</a></li>
            <li><a class="dropdown-item" href="menu.php?categoria=Perros">Perros</a></li>
            <li><a class="dropdown-item" href="menu.php?categoria=Entradas">Entradas</a></li>
            <li><a class="dropdown-item" href="menu.php?categoria=Bebidas">Bebidas</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" action ="menu.php" method="get">
        <input class="form-control me-2" name="busqueda"type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>



	<div class="grid-fluid container">
					
		<?php
            $obtener = "todos";
            // aca voy a ver si se eligio una categoria
            if(isset($_GET['categoria'])){
                $obtener = $_GET['categoria'];
                if($obtener!="todos"){
                $Respuesta = getCardsByCategoria($obtener);
                }
            }
            else if(isset($_GET['busqueda'])){
                $obtener = $_GET['busqueda'];
                $Respuesta =  getCardBysearch($obtener);
            }
            if($obtener=="todos"){
                $Respuesta = getCards();
            }
    		// en el while se crean todas los elementos con sus respectivos botones
			while ($Card = $Respuesta->fetch_assoc()) { 
            
                print("<div class='card' style='width: 18rem;'>");
                    print("<img class='card-img-top' src='".$Card['imagen']."' alt='Card image cap'>");
                    print("<div class='card-body'>");
                        print("<li class='list-group-item'><ul class=list-group list-group-flush>");
                        print("<li class='list-group-item'><h5 class='card-title'>".$Card['nombre']."</h5></li>");
                        print("<li class='list-group-item'><p class='card-text'>".$Card['descripcion']."</p></li>");
                        print("<li class='list-group-item'><p class='card-text'> Precio: ".$Card['precio']."</p></li>");
                        print("</ul>");
                    print("</div>");
                print("</div>");
           
			}

           
		?>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>