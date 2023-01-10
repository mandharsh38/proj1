<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Home</title>
</head>
<body>
    <?php include 'header.php'?>
    <form class="form-floating" action="" method="POST">
        <label for="numMeasure">Enter no. of Measurements:</label>
        <input type="text" class="form-control" id="numMeasure" name="numMeasure">
        <label for="cylCoeff">Cyl Coefficent c= </label>
        <input type="text" class="form-control" id="cylCoeff" name="cylCoeff">
    </form>
    
</body>
</html>
