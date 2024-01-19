<?php include 'header.php' ?>
<div class="product-page small-11 large-12 columns no-padding small-centered">

    <div class="global-page-container">

        <?php
        $codigoPrato = $_GET['prato'];

        $server = 'localhost';
        $user = 'root';
        $password = 'root';
        $db_name = 'restaurante';
        $port = '8889';

        $db_connect = new mysqli($server, $user, $password, $db_name, $port);
        mysqli_set_charset($db_connect, "utf8");

        if ($db_connect->connect_error) {
            echo 'Falha: ' . $db_connect->connect_error;
        } else {
            // echo 'Conexão feita com sucesso' . '<br><br>';
            $sql = "SELECT * FROM pratos WHERE codigo = '$codigoPrato'";
            $result = $db_connect->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $pratoNome = $row['nome'];
                    $pratoCategoria = $row['categoria'];
                    $pratoDescr = $row['descricao'];
                    $pratoPreco = $row['preco'];
                    $pratoCalorias = $row['calorias'];
                 }
            } else {
                'Não há destaques';
            }
        }
        ?>


        <?php if($pratoNome != NULL) { ?>
            <div class="product-section">
                <div class="product-info small-12 large-5 columns no-padding">
                    <h3><?php echo $pratoNome ?></h3>
                    <h4><?php echo $pratoCategoria ?></h4>
                    <p>
                    <?php echo $pratoDescr ?>
                    </p>
    
                    <h5><b>Preço: </b>
                    <?php echo $pratoPreco ?>
                    </h5>
                    <h5><b>Calorias: </b>
                    <?php echo $pratoCalorias ?>
                    </h5>
                </div>
    
                <div class="product-picture small-12 large-7 columns no-padding">
                    <img src="img/cardapio/<?php echo $codigoPrato ?>.jpg" alt="Foto do prato: <?php echo $pratoNome ?> ">
                </div>
    
            </div>
        <?php } else {
            echo 'Prato não encontrado!!';
            echo '<br>';
        } ?>

        <div class="go-back small-12 columns no-padding">
            <a href="cardapio.php">
                << Voltar ao Cardápio</a>
        </div>

    </div>
</div>
<?php include 'footer.php' ?>