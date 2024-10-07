/*
 Template Name: Lunoz - Admin & Dashboard Template
 Author: Myra Studio
 File: Chart Js
*/


(function($) {
  'use strict';
  $(function() {
    if ($("#pieChart").length) {
      var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
      var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: {
          datasets: [{
            data: [21, 16, 48, 31],
            backgroundColor: [
              '#3F51B5', 
              '#f8ac5a', 
              '#00c2b2', 
              '#f15050'
            ],
            borderColor: [
              '#3F51B5', 
              '#f8ac5a', 
              '#00c2b2', 
              '#f15050'
            ],
          }],
      
          // These labels appear in the legend and in the tooltips when hovering different arcs
          labels: [
            'Samsung',
            'Apple',
            'Vivo',
            'Motorola'
          ]
        },
        options: {
          responsive: true,
          animation: {
            animateScale: true,
            animateRotate: true
          }
        }
      });
    }

    
    
    
    if ($("#areaChart").length) {
      var areaData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            data: [22, 23, 28, 20, 27, 20, 20, 24, 10, 35, 20, 25],
            backgroundColor: [
              '#23b5e2'
            ],
            borderColor: [
              '#23b5e2'
            ],
            borderWidth: 1,
            fill: 'origin',
            label: "purchases"
          },
          {
            data: [50, 40, 48, 70, 50, 63, 63, 42, 42, 51, 35, 35],
            backgroundColor: [
              '#7266bb'
            ],
            borderColor: [
              '#7266bb'
            ],
            borderWidth: 1,
            fill: 'origin',
            label: "services"
          },
          {
            data: [95, 75, 90, 105, 95, 95, 95, 100, 75, 95, 90, 105],
            backgroundColor: [
              '#dfe3e9'
            ],
            borderColor: [
              '#dfe3e9'
            ],
            borderWidth: 1,
            fill: 'origin',
            label: "services"
          }
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            gridLines: {
              display: false,
              drawBorder: false,
              color: 'transparent',
              zeroLineColor: '#eeeeee'
            }
          }],
          yAxes: [{
            gridLines: {
              drawBorder: false,
              borderDash: [3, 3]
            },
          }]
        },
        legend: {
          display: false
        },
        tooltips: {
          enabled: true
        },
        elements: {
          line: {
            tension: 0
          },
          point: {
            radius: 0
          }
        }
      }
      var salesChartCanvas = $("#areaChart").get(0).getContext("2d");
      var salesChart = new Chart(salesChartCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
      });
    }
    areaChart
    
    if ($("#barChart").length) {
      var currentChartCanvas = $("#barChart").get(0).getContext("2d");
      var currentChart = new Chart(currentChartCanvas, {
        type: 'bar',
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
              label: 'Apple',
              data: [65, 59, 80, 81, 56, 89, 40, 32, 65, 59, 80, 81],
              backgroundColor: '#2ac14e'
            },
            {
              label: 'Samsung',
              data: [89, 40, 32, 65, 59, 80, 81, 56, 89, 40, 65, 59],
              backgroundColor: '#f8ac5a'
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: true,
          
          scales: {
            yAxes: [{
              display: false,
              gridLines: {
                drawBorder: false,
              },
              ticks: {
                fontColor: "#686868"
              }
            }],
            xAxes: [{
              ticks: {
                fontColor: "#686868"
              },
              gridLines: {
                display: false,
                drawBorder: false
              }
            }]
          },
          elements: {
            point: {
              radius: 0
            }
          }
        }
      });
    }
  });
})(jQuery);