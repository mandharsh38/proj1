<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Home</title>
    
</head>
<body>
    <a href="index.php">Home</a><br><br><br>
    <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="number" class="form-control initFormField" id="numMeasure" name="numMeasure" placeholder="numMeasure" required>
                        <label for="numMeasure">Enter no. of Measurements</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="number" class="form-control initFormField" id="cylCoeff" name="cylCoeff" placeholder="cylCoeff" required>
                        <label for="cylCoeff">Cyl Coefficent (c) </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12">
                        <label>Type of Average:</label>
                    </div>
                    <div class="col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input avgType" type="radio" name="avgType" id="medianAvg" value="median" checked>
                            <label class="form-check-label" for="medianAvg">Median</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input avgType" type="radio" name="avgType" id="meanAvg" value="mean">
                            <label class="form-check-label" for="meanAvg">Mean</label>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="number" class="form-control initFormField" id="plateThick" name="plateThick" placeholder="plateThick" required>
                        <label for="plateThick">Enter Plate Thickness (mm) </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="number" class="form-control initFormField" id="plateLen" name="plateLen" placeholder="plateLen" required>
                        <label for="plateLen">Enter Plate Length (mm) </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="number" class="form-control initFormField" id="plateWidth" name="plateWidth" placeholder="plateWidth" required>
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
                    <th id='cVal' scope="col">Estimate w/c</th>
                    <th scope="col">Volume Max</th>
                    <th scope="col">Volume Min</th>
                </tr>
            </thead>
            <tbody id='mainTableBody'>
            </tbody>
        </table>
    </div>

    <div>
        Plate area:
        <div id="plateArea">
        </div><br>
        <div>
            <h5>Total Volume Loss (mm&sup2)</h5>
            Best estimate:
            <div id="bestEstSum">
            </div>
            Max Volume: 
            <div id="maxVolSum">
            </div>
            Min Volume: 
            <div id="minVolSum">
            </div>
        </div><br>
         <div>
            <h5 id="mPitLoss">Median Pit Loss Values</h5>
            Best estimate:
            <div id="bestEstM">
            </div>
            Max Volume: 
            <div id="maxVolM">
            </div>
            Min Volume: 
            <div id="minVolM">
            </div>
        </div><br> 
        <div>
            <h5>Estimated Thickness Loss</h5>
            Best estimate:
            <div id="bestEstThickLoss">
            </div>
            Maximum: 
            <div id="maxThickLoss">
            </div>
            Minimum: 
            <div id="minThickLoss">
            </div>
        </div><br>
        <div>
            <h5>Remaining Plate Thickness (mm)</h5>
            Best estimate:
            <div id="bestEstPlateThick">
            </div>
            Maximum: 
            <div id="maxPlateThick">
            </div>
            Minimum: 
            <div id="minPlateThick">
            </div>
        </div><br>
        <div>
            <h5 id="remainPecentText">Remaining Plate as %</h5>
            Best estimate:
            <div id="bestEstPlateThickPercent">
            </div>
            Maximum: 
            <div id="maxPlateThickPercent">
            </div>
            Minimum: 
            <div id="minPlateThickPercent">
            </div>
        </div><br>
    </div>

    <script>

        // adding fields
        $(document).on('keyup', '#numMeasure', function(){
            
            var numRows = $(this).val();
            
            $('#mainTableBody').children().remove();
            
            for (var i=0; i<numRows; i++){
                let count = i + 1;
                var tableRowHtml = "<tr>"+
                                        "<th scope='row'>" + count + "</th>" + 
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

        var plateThickness;
        function storeThickVal(val){
            plateThickness = val;
        }
        $(document).on('blur','#plateThick', function(){
            storeThickVal($(this).val());
        })
        
        var typeAverage;
        function storeAverage(val){
            typeAverage = val;
        }
        $(document).on('change','.avgType', function(){
            storeAverage($(this).val());
            if ($(this).val() == "mean"){
                $('#mPitLoss').text("Mean Pit Loss Values");
            }if($(this).val() == "median"){
                $('#mPitLoss').text("Median Pit Loss Values");
            }
        })


        // validation (not working yet)

        // $(document).on('focus', '.dia', function(){
        //     $('.initFormField').each(function(){
        //         if ($(this).val == ""){
        //             console.log('in');
        //             $('.dia .depth').prop('disabled', true);
        //             $(this).after("<br><span style='color: red;'> This is a required Field!</span>");
        //         }
        //     })
        // }) 


        //arrays for values
        const depthPercentVal = [];
        const wBydVal = [];
        const wBycVal = [];
        const volMaxVal = [];
        const volMinVal = [];

        // calculations
        
        // depth %
        function depthPercent(depth, index){
            let plateThick = $('#plateThick').val();
            let value = (depth/plateThick)*100 ;
            value = Math.round(value*10)/10;
            depthPercentVal[index] = value;
            return value;
        }

        // w/d
        function wByd(dia, depth, index){
            let value = dia/depth;
            value = Math.round(value*100)/100;
            wBydVal[index] = value;
            return value;
        }
        
        // w/c
        function wByc(index){
            let cylCoeff = $('#cylCoeff').val();
            let value = $('#volMax' + index).text();
            value = value * cylCoeff;
            value = Math.round(value*100)/100;
            wBycVal[index] = value;
            return value;
        }
        
        // Max Volume
        function volMax(dia, depth, index){
            console.log(dia);
            console.log(depth);
            console.log(index);
            let value = Math.PI * depth * ((dia/2) ** 2);
            value = Math.round(value*10)/10;
            volMaxVal[index] = value;
            console.log(value)
            return value;
        }
        
        // Min Volume
        function volMin(index){
            let value = $('#volMax' + index).text();
            value = value/3;
            value = Math.round(value*10)/10;
            volMinVal[index] = value;
            return value;
        }

        // sum
        function sumArr(arr) {
            let sum = 0;
            arr.forEach((arrVal) => {
                sum += arrVal;
            })
            sum = Math.round(sum*100)/100;
            return sum;
        }

        //median
        function medianArr(arr) {
            if (arr.length == 0) {
                return; // 0.
            }
            arr.sort((a, b) => a - b); 
            const midpoint = Math.floor(arr.length / 2); 
            let median = arr.length % 2 === 1 ?
                arr[midpoint] : 
                (arr[midpoint - 1] + arr[midpoint]) / 2; 
            median = Math.round(median*100)/100;
            return median;
        }
        
        //mean
        function meanArr(arr) {
            let total = 0;
            let count = 0;
            arr.forEach(function(item, index) {
                total += item;
                count++;
            });
            return total / count;
        }

        //calculations on the right side
        function calcLoss(sum){
            let value = sum/9000;

            value = Math.round(value*100)/100;
            return value;
        }

        function remainThick(sum, thick){
            let value = sum/9000;
            value = thick - value;
            value = Math.round(value*100)/100;
            return value;
        }

        function calcPercentThick(remVal, thick){
            let value = remVal / thick;
            value = Math.round(value*100);
            return value;
        }

        $(document).on('change','input.depth', function(){
            
            let id = $(this).attr('id');
            let match = id.match(/[0-9]+$/);
            let index = parseInt(match[0]);
            
            let dia = $('#dia' + index).val();
            let depth = $('#depth' + index).val();
            
            // console.log("depth ="+depth);
            // console.log("dia ="+dia);
            
            $('#depthPercent' + index).text(depthPercent(depth, index) + "%");
            $('#wByd' + index).text(wByd(dia, depth, index));
            $('#volMax' + index).text(volMax(dia, depth, index));
            $('#wByc' + index).text(wByc(index));
            $('#volMin' + index).text(volMin(index));

            // calculations on the right side
            var estSum = sumArr(wBycVal);
            var maxSum = sumArr(volMaxVal);
            var minSum = sumArr(volMinVal);
            
            $('#bestEstSum').text(estSum);
            $('#maxVolSum').text(maxSum);
            $('#minVolSum').text(minSum);

            if (typeAverage == "mean"){
                $('#bestEstM').text(meanArr(wBycVal));
                $('#maxVolM').text(meanArr(volMaxVal));
                $('#minVolM').text(meanArr(volMinVal));
            }else{
                $('#bestEstM').text(medianArr(wBycVal));
                $('#maxVolM').text(medianArr(volMaxVal));
                $('#minVolM').text(medianArr(volMinVal));
            }

            $('#bestEstThickLoss').text(calcLoss(estSum));
            $('#maxThickLoss').text(calcLoss(maxSum));
            $('#minThickLoss').text(calcLoss(minSum));

            var remainThickEst = remainThick(estSum, plateThickness); 
            var remainThickMax = remainThick(maxSum, plateThickness); 
            var remainThickMin = remainThick(minSum, plateThickness); 

            $('#bestEstPlateThick').text(remainThickEst);
            $('#maxPlateThick').text(remainThickMax);
            $('#minPlateThick').text(remainThickMin);

            $('#bestEstPlateThickPercent').text(calcPercentThick(remainThickEst, plateThickness) + '%');
            $('#maxPlateThickPercent').text(calcPercentThick(remainThickMax, plateThickness) + '%');
            $('#minPlateThickPercent').text(calcPercentThick(remainThickMin, plateThickness) + '%');

            index = undefined;
            delete(index);

        })
        
        // Add value of c to column
        
        $(document).on('keyup','#cylCoeff', function(){
            $('#cVal').text('Estimate w/c = ' + $('#cylCoeff').val() + ')');
        })

        //  calculate plate area

        function plateArea(){
            var len = $('#plateLen').val();
            var wid = $('#plateWidth').val();
            return len * wid;
        }

        $(document).on('keyup', '#plateWidth', function(){
            $('#plateArea').text(plateArea());
        })
        $(document).on('keyup', '#plateLen', function(){
            $('#plateArea').text(plateArea());
        })

    </script>
</body>
</html>