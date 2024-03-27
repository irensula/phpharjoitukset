<?php require "header.php"; ?>

<body id="feedback-body">
    <div class="feedback-container">
        <form action="palautelomake.php" method="get">
            <label for="name">Nimesi:</label>
            <input type="text" name="name" id="name"><br>
            <label for="grade">Arvosi:</label>
            <input type="number" name="grade" id="grade" min=1 max=5><br>
            <label for="feedback">Palaute</label>
            <input type="text" name="feedback" id="feedback">
            <button class="button-orange" type="submit">Kirjoita</button>
        </form>
    </div>
</body>
</html>

<?php
    
    if(isset($_GET['name'], $_GET['grade'], $_GET['feedback'])){
        $name = htmlspecialchars($_GET['name']);
        $grade = htmlspecialchars($_GET['grade']);
        $feedback = htmlspecialchars($_GET['feedback']);

        $info = array();
        array_push($info, $name, $grade, $feedback);
        
        $file = fopen("palautteet.csv", "a");
        fputcsv($file, $info, ';');
        fclose($file);
    }
    
?>