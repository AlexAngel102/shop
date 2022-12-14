<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=false, initial-scale=1.0, maximum-scale=1.0, minimum-scale=0.7">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/materialize.min.css" rel="stylesheet">

    <title>Shop</title>
</head>

<body class="bg-dark bg-opacity-25">

<div class="m-3 p-3 bg-primary rounded-3 z-depth-1">
    <a class="text-white h1 p-3" href="/" id="main">Shop</a>
</div>

<div class="p-3 row-cols-2 right-align ">
    <div class="col-4 d-inline-flex">
        <label for="orderBy" class="col-sm-2 col-form-label col-form-label h2 text-black">Order by:</label>
        <select class="mx-3 col-4 rounded-5 text-md-center z-depth-1" id="order" name="order">
            <option value="price">Price</option>
            <option value="name" selected>A-z</option>
            <option value="date">Newest</option>
        </select>
    </div>
</div>

<div class="d-flex px-3">

    <div class="nav flex-column col-2 bg-warning rounded-3 h-25 z-depth-2">
        <p class="h2 m-2 nav-title">Categories</p>
        <div class="collection h6" name="categories" id="categories">

        </div>
    </div>

    <div class="container center" id="welcomeBlock"><h1>Welcome to shop</h1></div>

    <div class="row row-cols-1 row-cols-4 g-4 mx-1" id="productList">

    </div>
</div>
<footer>
</footer>

<!-- Category nav itemtemplate -->

<template id="categoryItem">
    <a href="" class="nav-link"><span class="right"></span></a>
</template>

<!--  Product card template  -->

<template id="product">
    <div class="col">
        <div class="border rounded-3 p-2 z-depth-2 bg-opacity-25 bg-light">
            <img src="../img/placeholder.svg" style="scale: 0.8"
                 class="card-img-top" alt="...">

            <div class="card-body">
                <h5 class="card-title"></h5>
            </div>
            <div class="p-2">
                <p class="card-text h5"><span><b>???</b></span></p>
            </div>
            <div class="row flex-row">
                <div class="col left">
                    <span class="right p-1" id="date"></span>
                </div>
                <div class="col right">
                    <button class="btn btn-outline-primary w-100">Buy</button>
                </div>
            </div>
        </div>
    </div>
</template>

<!-- Product modal-->
<template id="itemModal">
    <div class="modal fade postModal" id="productModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="../img/placeholder.svg" style="scale: 0.8"
                         class="card-img-top" alt="...">

                    <div class="container">
                        <h5 class="title"></h5>
                        <p class="text h5"><span><b>???</b></span></p>
                    </div>
                    <span class="right p-1" id="date"></span>
                </div>
                <div class="right">
                    <div class="flex-column px-3">
                        <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<!-- JavaScript -->
<script src="../../js/bootstrap.bundle.min.js"></script>
<script src="../../js/materialize.min.js"></script>
<script src="../../js/jquery-3.6.0.min.js"></script>
<script src="../../js/main.js"></script>

</body>

</html>