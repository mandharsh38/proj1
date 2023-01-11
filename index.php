<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Homepage</title>
    
</head>
<body>
    <a href="index.php">Home</a><br><br><br>
    <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="numMeasure" name="numMeasure" placeholder="numMeasure" required>
                        <label for="numMeasure">Enter no. of Measurements</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="cylCoeff" name="cylCoeff" placeholder="cylCoeff" required>
                        <label for="cylCoeff">Cyl Coefficent (c) </label>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="plateThick" name="plateThick" placeholder="plateThick" required>
                        <label for="plateThick">Enter Plate Thickness (mm) </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="plateLen" name="plateLen" placeholder="plateLen" required>
                        <label for="plateLen">Enter Plate Length (mm) </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="plateWidth" name="plateWidth" placeholder="plateWidth" required>
                        <label for="plateWidth">Enter Plate Width (mm) </label>
                    </div>
                </div>
            </div>
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
                    <th scope="col">Estimate w/c</th>
                    <th scope="col">Volume Max</th>
                    <th scope="col">Volume Min</th>
                </tr>
            </thead>
            <tbody id='mainTableBody'>
            </tbody>
        </table>
    </div>
    <script>
        $(document).on('keyup', '#numMeasure', function(){
            
            var numRows = $(this).val();
            // console.log(numRows);            
            
            $('#mainTableBody').children().remove();
            
            for (var i=1; i<=numRows; i++){

                var tableRowHtml = "<tr>"+
                                        "<th scope='row'>" + i + "</th>" + 
                                        "<td><input type='number' id='dia" + i + "' class='dia'></td>" + 
                                        "<td><input type='number' id='depth" + i + "' class='depth'></td>" + 
                                        "<td class='depthPercent' id='depthPercent" + i + "'></td>" + 
                                        "<td class='wByd' id='wByd" + i + "'></td>" + 
                                        "<td class='wByc' id='wByc" + i + "'></td>" + 
                                        "<td class='volMax' id='volMax" + i + "'></td>" + 
                                        "<td class='volMin' id='volMin" + i + "'></td>" + 
                                    "</tr>";
                
                $('#mainTableBody').append(tableRowHtml);
            }
        })
    </script>
    <script>
        // claculations

        // depth %
        function depthPercent(depth){
            var plateThick = $('#plateThick').val();
            var value = (depth/plateThick)*100 ;
            value = Math.round(value*10)/10;
            return value;
        }

        // w/d
        function wByd(dia, depth){
            var value = dia/depth;
            value = Math.round(value*100)/100;
            return value;
        }

        // w/c
        function wByc(dia){
            var cylCoeff = $('#cylCoeff').val();
            var value = dia/cylCoeff;
            value = Math.round(value*100)/100;
            return value;
        }

        // Max Volume
        function volMax(dia, depth){
            var value = Math.PI * depth * ((dia/2) ** 2);
            value = Math.round(value*10)/10;
            return value;
        }

        // Min Volume
        function volMin(index){
            var value = $('#volMax' + index).text();
            value = value/3;
            value = Math.round(value*10)/10;
            return value;
        }

        $(document).on('keyup','input.depth', function(){

            var index = $(this).attr('id');
            index = index.slice(-1);

            var dia = $('#dia' + index).val();
            var depth = $('#depth' + index).val();

            // console.log("depth ="+depth);
            // console.log("dia ="+dia);

            $('#depthPercent' + index).text(depthPercent(depth) + "%");
            $('#wByd' + index).text(wByd(dia, depth));
            $('#wByc' + index).text(wByc(dia));
            $('#volMax' + index).text(volMax(dia, depth));
            $('#volMin' + index).text(volMin(index));
        })
    </script>
</body>
</html>
