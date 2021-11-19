< script >
    $(function() {
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var labels = [];
        var datos = [];

        "<?php foreach($depart->result() as $dept):?>"
        labels.push("<?php echo $dept->nombre; ?>")
        "<?php endforeach;?>"
        var cont = 0;
        for (var i = 0; i < labels.length; i++) {
            "<?php foreach($eqpdpt->result() as $eqdpt):?>"

            //alert(labels[i]+" "+"<?php echo $eqdpt->departamento; ?>");
            if (labels[i] == "<?php echo $eqdpt->departamento; ?>") {
                cont++;
            }
            "<?php endforeach;?>"
            //alert(labels[i]+" "+cont);
            datos.push(cont);
            cont = 0;
        }

        //alert(datos);
        var barChartData = {
            labels: labels,
            datasets: [{
                label: 'Cantidad de equipos',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: datos
            }, ]
        }


        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        });
    }); < /script>