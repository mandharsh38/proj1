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
    <div class="container">
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="numMeasure" name="numMeasure" placeholder="numMeasure" required>
                        <label for="numMeasure">Enter no. of Measurements:</label>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="cylCoeff" name="cylCoeff" placeholder="cylCoeff" required>
                        <label for="cylCoeff">Cyl Coefficent c= </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="cylCoeff" name="cylCoeff" placeholder="cylCoeff" required>
                        <label for="cylCoeff">Enter Plate Thickness (mm) </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="cylCoeff" name="cylCoeff" placeholder="cylCoeff" required>
                        <label for="cylCoeff">Enter Plate Length (mm) </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="cylCoeff" name="cylCoeff" placeholder="cylCoeff" required>
                        <label for="cylCoeff">Enter Plate Width (mm) </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="submit" value="Submit" class="btn btn-success">
                </div>
            </div>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Measurement Number</th>
                <th scope="col">Diameter (w) mils</th>
                <th scope="col">Depth (d) mils</th>
                <th scope="col">Depth % of Plate Thickness</th>
                <th scope="col">w/d</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
                <?php for ($i=0; $i <$_POST['numMeasure'] ; $i++) { ?>

                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>

                <?php } ?>
            </tbody>
        </table>
</body>
</html>