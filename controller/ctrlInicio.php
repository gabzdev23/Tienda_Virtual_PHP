<?php
    function showShoes($con, $type) {
        $sql = "SELECT * FROM botas WHERE tipo='$type'";
        $query = mysqli_query($con, $sql); 
        $botas = array();
        
        while($row = mysqli_fetch_assoc($query)) {
            array_push($botas, $row);
        }

        for($i=0; $i < count($botas); $i++) {
            echo "<a href='bota.php?id=".$botas[$i]["id_botas"]."' class='text-decoration-none'>";

            echo "<li class='d-flex flex-column align-items-center card-hover'
            style='width: 18rem; height: 21rem'>";

            echo "<img src='public/imgs/".$botas[$i]["imagen"]."' class='card-img-top w-75' alt='...' />";

            echo "<div class='card-body'>";
            echo "<div class='card-text align-items-center d-flex flex-column'>";
            echo "<div class='card-text align-items-center d-flex flex-column'>";
            echo "<strong class='fs-5 text-dark'>".$botas[$i]["nom_botas"]."</strong>";
            echo "<div class='separator'></div>";
            echo "<strong class='text-danger fs-5'>$".$botas[$i]["precio"].".00</strong>";
            echo "</div></div> </li>";
            echo "</a>";
        };
    }


