<section class="w-75 m-auto">
    <div class="p-4">
        <label for="">Année :</label>
        <select name="year"  class="form-select year"  onchange="ref()" >
            <?php
            for($year =date("Y") ; $year >= 1900 ;$year-- ){
                echo '<option value="'.$year.'">'.$year.'</option>';
            }
            ?>
        </select>
        <br>
        <p class='text-dark text-opacity-50 text-uppercase'>
            sélectionnez une année pour voir les statistiques de cette année
        </p>
    </div>

    <div>
        <div class="card-title">
            <h6 class='text-darK-25' id="title01"></h6>
        </div>
        <div class='card'>
            <div class='card-body'>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</section>


