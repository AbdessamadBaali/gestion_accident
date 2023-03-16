    try {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText)
            const path = './scriptJS/myChart.json';
            const ctx = document.getElementById('myChart');
            const title01 = document.getElementById('title01');
            let year = document.querySelector(".year")

            fetch(path)  
            .then((response) => response.json())
            .then((datajson) => {
                let number_acc = [],
                lables_acc = [];  

                if(datajson.info !== "null") {
                    datajson.info.map(elem => { 
                        lables_acc.push(elem.type_acc)
                        number_acc.push(elem.number_acc)
                    })
                    title01.innerText = "STATISTIQUE  De " + year.value ;

                
                }  else {
                    title01.innerText = "PAS DE STATISTIQUE De " + year.value ;
                }

                let delayed;
                const  data = {
                    labels: lables_acc,
                    datasets: [{
                        label: 'Nomber d\'accident',
                        data: number_acc,
                        parsing: {
                            xAxisKey: 'type_accident',
                            yAxisKey: 'number_accident'
                        },
                        borderWidth: 1,
                        backgroundColor : '#5d98b5',
                        borderColor : '#5d98b5',
                        radius : 4,
                        hoverRadius : 8,
                        tension : .3,

                    }]
                };
                
            const config = {
                type: 'bar',
                data : data,
                responsive: true,
                
                options: {
                    scales: {
                        y : {
                            beginAtZero: true,
                            // max: 15
                        }
                    },
                    animation : {
                        onComplete : () => {
                            delayed = true;
                        },
                        delay : (context) => {
                            let delay = 0;
                            if (context.type === "data" && context.mode === "default" && !delayed) {
                                delay = context.dataIndex * 300 + context.datasetIndex * 100;
                            }
                            return delay ;
                        },
                    }
                }
            }

            window.myChart = new Chart(ctx, config );
            if(number_acc.length == 0)
                title01.innerText = "PAS DE STATISTIQUE De " +year.value ;
            else 
                title01.innerText = "STATISTIQUE De " + year.value ;
                }); 
        }
    };

    let year = document.querySelector(".year")
    if(year !== null) {
        let yearV = year.options[year.selectedIndex].value;

        xmlhttp.open("GET", "./model/chart.php?myChart&year="+yearV, true);
        xmlhttp.send();
    }
} catch (error) {
    alert("Erreur !!")
} 


function refrech() {
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const path = './scriptJS/myChart.json';

            fetch(path)  
            .then((response) => response.json())
            .then((datajson) => {
                let lables_acc =[],
                number_acc= [];

                if(datajson.info !== "null") {
                    datajson.info.map(elem => { 
                        lables_acc.push(elem.type_acc)
                        number_acc.push(elem.number_acc)
                    })
                    title01.innerText = "STATISTIQUE  De " + year.value ;

                
                }  else {
                    title01.innerText = "PAS DE STATISTIQUE De " + year.value ;
                }
                window.myChart.options = {
                    plugins: {
                        title: {
                            display: true,
                            text: 'infos sur les groupes ' + datajson.year,
                        }
                    }
                }

                window.myChart.data.labels = lables_acc;
                window.myChart.data.datasets.data = number_acc;
                window.myChart.update();

                
            })
                
        }
    }
    let year = document.querySelector(".year")
    if(year !== null) {
        let yearV = year.options[year.selectedIndex].value;

        xmlhttp.open("GET", "./model/chart.php?myChart&year="+yearV, true);
        xmlhttp.send();
    }
}



