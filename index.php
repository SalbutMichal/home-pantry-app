<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domowa spiżarnia</title>
    <script src="https://kit.fontawesome.com/25fc1961d2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>

<body>
    <header class="page-header">
        <nav class="page-nav">
            <p class="page-nav__element">
                    Przegląd spiżarni
            </p>
        </nav>
    </header>
    <div class="button-wrapper">
        <button class="page-button__add-product">Dodaj produkt do spiżarni</button>
    </div>
    <section class="page-content">
        <div class="page-content__table">
            <div class="page-content__table-row">
                <div class="page-content__table-cell">Lp.</div>
                <div class="page-content__table-cell">Nazwa</div>
                <div class="page-content__table-cell">Zdjęcie</div>
                <div class="page-content__table-cell">Data przydatności</div>
                <div class="page-content__table-cell">Lokalizacja produtku</div>
                <div class="page-content__table-cell">Kod kreskowy</div>
            </div>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "spizarnia";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM produkty";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="page-content__table-row">
                                <div class="page-content__table-cell">'.$row['id'].'</div>
                                <div class="page-content__table-cell">'.$row['name'].'</div>
                                <div class="page-content__table-cell"><img class="page-content__table-thumbnail" src="'.$row['photo'].'" /></div>
                                <div class="page-content__table-cell">'.$row['expiration_date'].'</div>
                                <div class="page-content__table-cell">'.$row['product_location'].'</div>
                                <div class="page-content__table-cell">'.$row['bar_code'].'</div>
                            </div>';
                        
                        // "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["photo"]. "<br>";
                    }
                } 
                $conn->close();
            ?>
        </div>
    </section>
    <!-- The Modal -->
    <div class="modal-add-product">
        <div class="modal-add-product__content">
            <form method="POST">
                <div class="modal-add-product__header">
                    <h2>Dodawanie produktu do spiżarni</h2>
                    <span class="modal-add-product__close">&times;</span>
                </div>
                <div class="modal-add-product__body">

                    <div class="formbold-main-wrapper">
                        <!-- Author: FormBold Team -->
                        <!-- Learn More: https://formbold.com -->
                        <div class="formbold-form-wrapper">
                            <div class="flex flex-wrap formbold--mx-3">
                                <div class="w-full sm:w-half formbold-px-3">
                                    <div class="formbold-mb-5">
                                        <label for="product_name" class="formbold-form-label"> Nazwa produktu </label>
                                        <input type="text" name="product_name" id="product_name" placeholder="Nazwa produktu"
                                            class="formbold-form-input" />
                                    </div>
                                </div>
                                <div class="w-full sm:w-half formbold-px-3">
                                    <div class="formbold-mb-5">
                                        <label for="file" class="formbold-form-label"> Zdjęcie produktu </label>
                                        <input type="file" id="file" name="file" />
                                        <br>
                                        <div id="image-thumbnail" class="image-thumbnail"></div>
                                    </div>
                                </div>
                                <div class="w-full sm:w-half formbold-px-3">
                                    <div class="formbold-mb-5">
                                        <label for="expiration_date" class="formbold-form-label"> Data przydatności </label>
                                        <input type="date" name="expiration_date" id="expiration_date" class="formbold-form-input" />
                                    </div>
                                </div>
                            </div>

                            <div class="formbold-mb-5">
                                <label for="product_location" class="formbold-form-label">
                                    Lokalizacja produktu
                                </label>
                                <input type="text" name="product_location" id="product_location" placeholder="Lokalizacja produktu" class="formbold-form-input" />
                            </div>

                            <div class="flex flex-wrap formbold--mx-3">
                                <div class="w-full sm:w-half formbold-px-3">
                                    <div class="formbold-mb-5 w-full">
                                        <label for="bar_code" class="formbold-form-label"> Kod kreskowy </label>
                                        <input type="text" name="bar_code" id="bar_code" placeholder="Kod kreskowy" class="formbold-form-input" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-add-product__footer">
                    <button type="button"  class="modal-add-product__footer-btn modal-add-product__footer-btn--save">Dodaj produkt</button>
                </div>
            </form>
        </div>
    </div>
    <footer class="page-footer">
        <p>Wszelkie prawa dozwolone, copyleft by Sałbut Michał, Strzylak Piotr</p>
    </footer>

    <script src="./scripts/script.js"></script>
</body>

</html>