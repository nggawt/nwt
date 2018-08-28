 var chart = document.getElementById("myChart"),url = url = window.location.href,myChart;
 function getValue(a){
    var selectedItem = document.getElementById("selected"),
        param = a?(a.options[a.selectedIndex].getAttribute('id')):null;//(selectedItem.options[selectedItem.selectedIndex].getAttribute('id')),
        selectedId = a?a.selectedIndex :selectedItem.selectedIndex;
    
    if(myChart) myChart.destroy();
    selectedId = (typeof selectedId === "number")?selectedId:"";
    
    if((param && selectedId) || (param && typeof selectedId === "number")){
         param = "test?pickDate=" + param+"&selected="+selectedId;
    }else if(param && (! selectedId)){
        param = "test?pickDate=" + param;
    }else if(selectedId && (! param)){
        param = "test?selected="+selectedId;
    }else{
        param = "test";
    }
    
    var labels =[],data=[],
        responses = getRequest(param,selectedId,{
            response: function(res){
                for(ii in res.data){
                    data.push(res.data[ii] || 1);
                    labels.push(ii);
                }
                selectedItem.options[res.selected].setAttribute("selected",true);
                canvas(data,labels,res.status);
            }
        });
}

if(url === "https://nggawt/admin" || url === "http://nggawt:8080/admin") getValue();
function canvas(response,lab,status){
    // Chart.defaults.global.animation = false;
    var ctx = chart.getContext('2d');

    myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: lab,
            datasets: [{
                // label: 'סיכום '  + status,
                data: response,
                backgroundColor: [
                    
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(0,0,255,.2)'
                ],
                borderColor: [
                    
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,99,132,1)',
                    'blue'
                ],
                borderWidth: 1
            }],
        },
        options: {
            title: {
                display: true,
                text: 'גרף מבקרים ' + status,
                fontSize:16
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
            legend: {
                display: false,
                labels: {
                    fontColor: 'blue'
                }
            }
        }
    });
}
    