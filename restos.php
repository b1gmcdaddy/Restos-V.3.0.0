<?php
include("config.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jolo and Ali's Foodtrips</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="style.css" rel="stylesheet">
</head>

<body>

    <div class="container-lg mt-5">
        <header id="main-header" class="text-white p-4 mb-3" style="background-color: #2C5282; border: 2px solid">
            <div class="row">
                <div class="col-md-12">
                    <h1 id="header-title">FoodTrips
                        <i class="fa fa-cutlery me-2" style="float:right"></i>
                    </h1>
                </div>
            </div>
        </header>
        <div class="card p-2" style="background-color:#faf0e6;">
            <div class="card-body" style="background-color:#faf0e6;">
                <form action="" method="POST" style="background-color:#faf0e6;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Restaurant</span>
                                    <input type="text" class="form-control" name="resto" aria-label="Username"
                                        aria-describedby="basic-addon1" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <select class="form-select" id="typeSelect" name="type" required>
                                    <option value="Meal">Meal</option>
                                    <option value="Snack">Snack</option>
                                    <option value="Dessert">Dessert</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                            name="notes"></textarea>
                        <label for="floatingTextarea">Notes/Description</label>
                    </div>
                    <div class="d-grid mt-3">
                        <button class="btn add-button" type="submit">ADD</button>
                    </div>
                </form>


            </div>
            <div class="listofRestos mt-3 p-3" id="listContainer" style="max-height: 300px; overflow-y: auto;">
                <?php
    $sql = "SELECT resto_name, meal_type, resto_id, resto_desc FROM places";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $type = $row['meal_type'];
            $resto = $row['resto_name'];
            $restoId = $row['resto_id'];
            $restoDesc = $row['resto_desc'];

            echo '<div class="row mb-2">';
            echo '<div class="col-md-4 data-entry" style="text-align:center;">' . $resto . '</div>';
            echo '<div class="col-md-4" style="text-align:center;"></div>';
            echo '<div class="col-md-4" style="text-align:center;"><a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#descriptionModal' . $restoId . '"><i class="fas fa-info-circle" id="infoIcon"></i></a>
            <a href="delete_resto.php?id=' . $restoId . '" class="btn"><i class="fas fa-trash" id="trashIcon"></i></a></div>';
            echo '</div>';

            // Modal for displaying restaurant description
            echo '<div class="modal fade" id="descriptionModal' . $restoId . '" tabindex="-1" aria-labelledby="descriptionModalLabel' . $restoId . '" aria-hidden="true">';
            echo '<div class="modal-dialog">';
            echo '<div class="modal-content">';
            echo '<div class="modal-header">';
            echo '<h5 class="modal-title" id="descriptionModalLabel' . $restoId . '">Restaurant Type & Notes</h5>';
            echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            echo '</div>';
            echo '<div class="modal-body">';
            echo '<p>' . $type . '</p>';
            echo '<p>' . $restoDesc . '</p>';
            echo '</div>';
            echo '<div class="modal-footer">';
            echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>No data available.</p>';
    }
    ?>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>