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
                        <input type="number" class="form-control" id="numMeasure" name="numMeasure" placeholder="numMeasure" value="<?php echo $_POST['numMeasure']; ?>" required>
                        <label for="numMeasure">Enter no. of Measurements:</label>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="cylCoeff" name="cylCoeff" placeholder="cylCoeff" value="<?php echo $_POST['cylCoeff']; ?>" required>
                        <label for="cylCoeff">Cyl Coefficent (c) </label>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="plateThick" name="plateThick" placeholder="plateThick" value="<?php echo $_POST['plateThick']; ?>" required>
                        <label for="plateThick">Enter Plate Thickness (mm) </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="plateLen" name="plateLen" placeholder="plateLen" value="<?php echo $_POST['plateLen']; ?>" required>
                        <label for="plateLen">Enter Plate Length (mm) </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="plateWidth" name="plateWidth" placeholder="plateWidth" value="<?php echo $_POST['plateWidth']; ?>" required>
                        <label for="plateWidth">Enter Plate Width (mm) </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="submit" value="Submit" class="btn btn-success">
                </div>
            </div>
        </form>
    </div>
    <br><br>
    <div>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Diameter (w) mils</th>
                    <th scope="col">Depth (d) mils</th>
                    <th scope="col">Depth % of Plate Thickness</th>
                    <th scope="col">w/d</th>
                    <th scope="col">Estimate w/c (c=<?php echo $_POST['cylCoeff']; ?>)</th>
                    <th scope="col">Volume Max</th>
                    <th scope="col">Volume Min</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i=0; $i <$_POST['numMeasure'] ; $i++) { ?>

                <tr>
                    <th scope="row"><?php echo $i+1 ?></th>
                    <td><input type="number"></td>
                    <td><input type="number"></td>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>