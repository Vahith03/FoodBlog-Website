<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/fontawesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="ol-lg-12 text-center border rounded bg-light my-5">
                <h1>MY CART</h1>
            </div>

            <div class="col-lg-9">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Food Name</th>
                            <th scope="col">Food Price</th>
                            <th scope="col">Food Location</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $total = 0;
                        if (isset($_SESSION['cart'])) {
                            // print_r($_SESSION['cart']);
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $sr=$key+1;
                                $total += $value['Price'];
                                echo "
                            <tr>
                            <th>$sr</th>
                            <th>$value[Item_Name]</th>
                            <td>$value[Price]</td>
                            <td>$value[location]</th>
                            <td>
                                <form action='cart_manage.php' method='POST'>
                                    <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                                    <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                </form>
                            </td>
                        </tr>
                            ";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-3">
                <div class="border rounded p-4 tot">
                    <h4>Total : <?php echo $total ?> </h4>
                </div>
            </div>
        </div>
        <!-- <td><input class='text-center' type='number' value='$value[Quantity]' min='1' max='10'></td> -->
    </div>
</body>

</html>