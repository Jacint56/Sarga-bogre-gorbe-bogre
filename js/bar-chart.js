/*var ctx = document.getElementById('myBarChart');

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          x: [{
            
            gridLines: {
              display: true,
              drawBorder: true
            },
            ticks: {
              maxTicksLimit: 6
            },
            maxBarThickness: 25,
          }],
          y: [{
            ticks: {
              min: 0,
              max: 15000,
              maxTicksLimit: 5,
              padding: 10,
              
              
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: true,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        }
    }
});*/

/*$(document).ready(function () {
  $.ajax({
      url: "../backend_php/chart-data.php",
      type: "GET",
      success: function (data) {
          var date_time = [];
          var value = [];
          for (var i in data) {
              date_time.push("" + data[i].);
              value.push(data[i].value);
          }
          var chartdata = {
              labels: date_time,
              datasets: [
                  {
                      label: "value",
                      fill: false,
                      lineTension: 0.3,
                      backgroundColor: chartColors.green,
                      borderColor: chartColors.green,
                      pointHoverBackgroundColor: chartColors.green,
                      pointHoverBorderColor: chartColors.green,
                      hoverBackgroundColor: chartColors.gold,
                      data: value,
                      yAxisID: "y-axis-1"
                  }
              ]
          };
          var ctx = $("#myBarChart");
          var LineGraph = new Chart(ctx, {
              type: 'bar',
              data: chartdata,
              options: {
                  title: {
                      display: true,
                      text: '',
                      maintainAspectRatio: false,
                      fontColor: chartColors.green
                  },
                  responsive: true,
                  scales: {
                      xAxes: [{
                          display: true,
                          scaleLabel: {
                              display: true,
                              labelString: ''
                          }
                      }],
                      yAxes: [{
                          type: "linear",
                          display: true,
                          position: "left",
                          id: "y-axis-1",
                          scaleLabel: {
                              display: false,
                              labelString: 'value'
                          }
                      }]
                  }
              }
          });
      },
      error: function (data) {
      }
  });
});
window.chartColors = {
  red: 'rgb(255, 99, 132)',
  orange: 'rgb(255, 159, 64)',
  yellow: 'rgb(255, 205, 86)',
  green: 'rgb(75, 192, 192)',
  blue: 'rgb(54, 162, 235)',
  purple: 'rgb(153, 102, 255)',
  gold: 'rgb(248,193,28)',
  grey: 'rgb(201, 203, 207)'
};*/