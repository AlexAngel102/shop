<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/materialize.min.css" rel="stylesheet">

    <title>Shop</title>
</head>
<header></header>

<body>
<div class="px-3">
    <h1><a class="text-black" href="/">Shop</a></h1>
</div>

<div class="w-25">
    <label for="orderBy" class="text-black select-label">Order by:</label>
    <div class="col-sm">
        <select id="orderBy" name="order">
            <option value="byPrice">Price</option>
            <option value="alphabetic">A-z</option>
            <option value="byNewest">Newest</option>
        </select>
    </div>
</div>

    <div class="d-flex px-3">

        <div class="nav flex-column left-align col-sm-2">
            <div class="collection" name="categories" id="categories">
                <a href="#" class="nav-link">Phones</a>
                <a href="#" class="nav-link">Tablets</a>
                <a href="#" class="nav-link">Laptop</a>
                <a href="#" class="nav-link">Smart Watches</a>
                <a href="#" class="nav-link">TVs</a>
            </div>
        </div>


        <div class="row row-cols-1 row-cols-4 g-4" id="productList">

        </div>
    </div>
    <footer>
    </footer>

    <!--  Product card template  -->
    <template id="product">
        <div class="col">
            <div class="card">
                <img src="img/placeholder.svg" style="scale: 0.8"
                     class="card-img-top" alt="...">

                <div class="card-body">
                    <h5 class="card-title">Name</h5>
                    <p class="card-text">Price</p>
                </div>
            </div>
        </div>
    </template>

    <!-- Product modal-->
    <div class="modal fade postModal" id="productModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="img/placeholder.svg" style="scale: 0.8"
                         class="card-img-top" alt="...">

                    <div class="card-body">
                        <h5 class="card-title">Name</h5>
                        <p class="card-text">Price</p>
                    </div>
                </div>
                <div class="d-flex right">
                    <div class="flex-column px-3">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                    <div class="px-3 flex-column">
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </div>
                    <p></p>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/materialize.min.js"></script>
    <script src="../../js/jquery-3.6.0.min.js"></script>
    <script src="../../js/main.js"></script>

</body>

</html>