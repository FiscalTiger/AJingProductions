<?php
   function __autoload($class) {
	require_once $class . '.php';
   }
?>
<!-- Portfolio Grid Section -->
<section id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Portfolio</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <?php
            $dbname = "ajing_productions";
            $projects_modals = array();
            $project_tiles = array();

            // Create connection
            $conn = new mysqli(
                    ini_get("mysql.default_host"),
                    ini_get("mysql.default_user"),
                    ini_get("mysql.default_password"),
                    $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM projects ORDER BY proj_id ASC";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                // Create the project tiles and modal classes
                while($row = $result->fetch_assoc()) {
                    $project_tiles[] = new ProjectTile($row['proj_id'], $row['png']);
                    $projects_modals[] = new ProjectModal($row['proj_id'], $row['title'], $row['png'], $row['problem'], $row['importance'], $row['role'], $row['learned'], $row['client'], $row['date'], $row['service']);
                }
                // Print out the tiles
                foreach ($project_tiles as $key => $value) {
                    echo $value;
                }
            } else {
                echo "<p>No Entries</p>";
            }
            $conn->close();
            ?>
        </div>
    </div>
</section>



<!-- Portfolio Modals -->
<?php
/*
    Print out the modals with the following information
    
    ● State the project title.

    ● State the problem you wanted to solve / opportunity you wanted to explore / goal you
    wanted to achieve.

    ● Explain why was the project of interest / important.

    ● Describe your role.

    ● What were the most important things (list at least 3), in your opinion, you learned from
    doing this project?
*/
foreach ($projects_modals as $key => $value) {
    echo $value;
}
?>
