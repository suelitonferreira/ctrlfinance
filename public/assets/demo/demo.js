type = ['primary', 'info', 'success', 'warning', 'danger'];

demo = {
  initPickColor: function() {
    $('.pick-class-label').click(function() {
      var new_class = $(this).attr('new-class');
      var old_class = $('#display-buttons').attr('data-class');
      var display_div = $('#display-buttons');
      if (display_div.length) {
        var display_buttons = display_div.find('.btn');
        display_buttons.removeClass(old_class);
        display_buttons.addClass(new_class);
        display_div.attr('data-class', new_class);
      }
    });
  },

  initDashboardPageCharts: function() {

    gradientChartOptionsConfigurationWithTooltipBlue = {
      maintainAspectRatio: false,
      legend: {
        display: false
      },

      tooltips: {
        backgroundColor: '#f5f5f5',
        titleFontColor: '#333',
        bodyFontColor: '#666',
        bodySpacing: 4,
        xPadding: 12,
        mode: "nearest",
        intersect: 0,
        position: "nearest"
      },
      responsive: true,
      scales: {
        yAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.0)',
            zeroLineColor: "transparent",
          },
          ticks: {
            suggestedMin: 60,
            suggestedMax: 125,
            padding: 20,
            fontColor: "#2380f7"
          }
        }],

        xAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            padding: 20,
            fontColor: "#2380f7"
          }
        }]
      }
    };

    gradientChartOptionsConfigurationWithTooltipPurple = {
      maintainAspectRatio: false,
      legend: {
        display: false
      },

      tooltips: {
        backgroundColor: '#f5f5f5',
        titleFontColor: '#333',
        bodyFontColor: '#666',
        bodySpacing: 4,
        xPadding: 12,
        mode: "nearest",
        intersect: 0,
        position: "nearest"
      },
      responsive: true,
      scales: {
        yAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.0)',
            zeroLineColor: "transparent",
          },
          ticks: {
            suggestedMin: 60,
            suggestedMax: 125,
            padding: 20,
            fontColor: "#9a9a9a"
          }
        }],

        xAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(225,78,202,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            padding: 20,
            fontColor: "#9a9a9a"
          }
        }]
      }
    };

    gradientChartOptionsConfigurationWithTooltipOrange = {
      maintainAspectRatio: false,
      legend: {
        display: false
      },

      tooltips: {
        backgroundColor: '#f5f5f5',
        titleFontColor: '#333',
        bodyFontColor: '#666',
        bodySpacing: 4,
        xPadding: 12,
        mode: "nearest",
        intersect: 0,
        position: "nearest"
      },
      responsive: true,
      scales: {
        yAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.0)',
            zeroLineColor: "transparent",
          },
          ticks: {
            suggestedMin: 50,
            suggestedMax: 110,
            padding: 20,
            fontColor: "#ff8a76"
          }
        }],

        xAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(220,53,69,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            padding: 20,
            fontColor: "#ff8a76"
          }
        }]
      }
    };

    gradientChartOptionsConfigurationWithTooltipGreen = {
      maintainAspectRatio: false,
      legend: {
        display: false
      },

      tooltips: {
        backgroundColor: '#f5f5f5',
        titleFontColor: '#333',
        bodyFontColor: '#666',
        bodySpacing: 4,
        xPadding: 12,
        mode: "nearest",
        intersect: 0,
        position: "nearest"
      },
      responsive: true,
      scales: {
        yAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.0)',
            zeroLineColor: "transparent",
          },
          ticks: {
            suggestedMin: 50,
            suggestedMax: 125,
            padding: 20,
            fontColor: "#9e9e9e"
          }
        }],

        xAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(0,242,195,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            padding: 20,
            fontColor: "#9e9e9e"
          }
        }]
      }
    };


    gradientBarChartConfiguration = {
      maintainAspectRatio: false,
      legend: {
        display: false
      },

      tooltips: {
        backgroundColor: '#f5f5f5',
        titleFontColor: '#333',
        bodyFontColor: '#666',
        bodySpacing: 4,
        xPadding: 12,
        mode: "nearest",
        intersect: 0,
        position: "nearest"
      },
      responsive: true,
      scales: {
        yAxes: [{

          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            suggestedMin: 60,
            suggestedMax: 120,
            padding: 20,
            fontColor: "#9e9e9e"
          }
        }],

        xAxes: [{

          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            padding: 20,
            fontColor: "#9e9e9e"
          }
        }]
      }
    };
    //----------INICIO GRAFICO DO SALDO MENSAL------------
     /**
     * Chama a API para obter os dados
     *
     * @param {string} date
     */
      function getSaldoMensal() {
        $.ajax({
            url: '/saldo',
            dataType: 'json',
            success: function (response) {
                var chart_labels = Object.keys(response);
                var chart_data = Object.values(response);

                if (chart_data > 1) {
                  var chart_color = '#008000';
                }else{
                  var chart_color = '#FF0000';
                }
                createChartMensal(chart_labels, chart_data,chart_color);
              }
          })
      }
    /**
     * Cria o convas com o Gráfico através do Chart.js
     *
     * @param {array} chart_labels
     * @param {array} chart_data
     * @param {string} chart_color
     */
    function createChartMensal(chart_labels,chart_data, chart_color){

      var ctx = document.getElementById("chartSaldo").getContext("2d");

      var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

      gradientStroke.addColorStop(1, 'rgba(72,72,176,0.2)');
      gradientStroke.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors

      var data = {
        labels: chart_labels,
        datasets: [{
          label: "R$",
          fill: true,
          backgroundColor: gradientStroke,
          hoverBackgroundColor: gradientStroke,
          borderColor: chart_color,
          borderWidth: 2,
          borderDash: [],
          borderDashOffset: 0.0,
          data: chart_data,
        }]
      };

      var myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        responsive: true,
        legend: {
          display: false
        },
        options: gradientBarChartConfiguration
      });
    }
    //----------FIM GRAFICO DO SALDO MENSAL------------

    //----------INICIO GRAFICO DE CATEGORIA------------
     /**
     * Chama a API para obter os dados
     *
     * @param {string} date
     */
      function getCategoriaDado() {
        $.ajax({
            url: '/categorias',
            dataType: 'json',
            success: function (response) {
                var chart_labels = Object.keys(response);
                var chart_data = Object.values(response);
                createChartCategoria(chart_labels, chart_data);
                }
            })
      }
      /**
     * Cria o convas com o Gráfico através do Chart.js
     *
     * @param {array} chart_labels
     * @param {array} chart_data
     */
    function createChartCategoria(chart_labels,chart_data){

      var ctx = document.getElementById("chartCategory").getContext("2d");

      var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

      gradientStroke.addColorStop(1, 'rgba(72,72,176,0.2)');
      gradientStroke.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors

      var data = {
        labels: chart_labels,
        datasets: [{
          label: "R$",
          fill: true,
          backgroundColor: gradientStroke,
          hoverBackgroundColor: gradientStroke,
          borderColor: '#ff8a76',
          borderWidth: 2,
          borderDash: [],
          borderDashOffset: 0.0,
          data: chart_data,
        }]
      };

      var myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        responsive: true,
        legend: {
          display: false
        },
        options: gradientBarChartConfiguration
      });
    }
    //----------FIM GRAFICO DE CATEGORIA------------

    //----------INICIO GRAFICO DE ATIVOS------------
     var ctx = document.getElementById("chartAtivos").getContext("2d");

     var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);
 
     gradientStroke.addColorStop(1, 'rgba(72,72,176,0.2)');
     gradientStroke.addColorStop(0.2, 'rgba(72,72,176,0.0)');
     gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors
 
     var data = {
       labels: ['ATIVO-01','ATIVO-02','ATIVO-03','ATIVO-04','ATIVO-05','ATIVO-06','ATIVO-07','ATIVO-08','ATIVO-09','ATIVO-10','ATIVO-11','ATIVO-12','ATIVO-13'],
       datasets: [{
         label: "R$",
         fill: true,
         backgroundColor: gradientStroke,
         hoverBackgroundColor: gradientStroke,
         borderColor: '#2c6675',
         borderWidth: 2,
         borderDash: [],
         borderDashOffset: 0.0,
         data: [0,0,0,0,0,0,0,0,0,0,0,0,0],
       }]
     };
 
     var myChart = new Chart(ctx, {
       type: 'bar',
       data: data,
       responsive: true,
       legend: {
         display: false
       },
       options: gradientBarChartConfiguration
     });
 
     //----------FIM GRAFICO DE ATIVOS------------

    //----------INICIO GRAFICO DE CONSOLIDADO ANUAL------------
    /**
     * Chama a API para obter os dados
     *
     * @param {string} date
     */
       function getAnualDado() {
        $.ajax({
            url: '/anual/gasto',
            dataType: 'json',
            success: function (response) {
                var chart_labels = Object.keys(response);
                var chart_data = Object.values(response);
                consolidadoAnual(chart_labels, chart_data);
                }
            })
        }
    /**
     * Cria o convas com o Gráfico através do Chart.js
     *
     * @param {array} chart_labels
     * @param {array} chart_data
     */
    function consolidadoAnual(chart_labels,chart_data){

      var ctx = document.getElementById("chartBig1").getContext('2d');

      var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

      gradientStroke.addColorStop(1, 'rgba(72,72,176,0.1)');
      gradientStroke.addColorStop(0.4, 'rgba(72,72,176,0.0)');
      gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors
      var config = {
        type: 'line',
        data: {
          labels: chart_labels,
          datasets: [{
            label: 'R$',
            fill: true,
            backgroundColor: gradientStroke,
            borderColor: '#d346b1',
            borderWidth: 2,
            borderDash: [],
            borderDashOffset: 0.0,
            pointBackgroundColor: '#d346b1',
            pointBorderColor: 'rgba(255,255,255,0)',
            pointHoverBackgroundColor: '#d346b1',
            pointBorderWidth: 20,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 15,
            pointRadius: 4,
            data: chart_data,
          }]
        },
        options: gradientChartOptionsConfigurationWithTooltipPurple
      };
      var myChartData = new Chart(ctx, config);
      $("#0").click(function() {
        $.ajax({
          url: '/anual/gasto',
          dataType: 'json',
          success: function (response) {
              var chart_labels = Object.keys(response);
              var chart_data = Object.values(response);

              var data = myChartData.config.data;
            
              data.datasets[0].data = chart_data;
              data.labels = chart_labels;
              myChartData.update();
    
              }
          })
      });
      $("#1").click(function() {
        $.ajax({
          url: '/anual/investimento',
          dataType: 'json',
          success: function (response) {
              var chart_labels = Object.keys(response);
              var chart_data = Object.values(response);

              var data = myChartData.config.data;
            
              data.datasets[0].data = chart_data;
              data.labels = chart_labels;
              myChartData.update();
    
              }
          })
      });
      $("#2").click(function() {
        $.ajax({
          url: '/anual/receita',
          dataType: 'json',
          success: function (response) {
              var chart_labels = Object.keys(response);
              var chart_data = Object.values(response);

              var data = myChartData.config.data;
            
              data.datasets[0].data = chart_data;
              data.labels = chart_labels;
              myChartData.update();
    
              }
          })
      });
     }
    //----------FIM GRAFICO DE CONSOLIDADO ANUAL------------


    var ctx = document.getElementById("CountryChart").getContext("2d");

    var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

    gradientStroke.addColorStop(1, 'rgba(29,140,248,0.2)');
    gradientStroke.addColorStop(0.4, 'rgba(29,140,248,0.0)');
    gradientStroke.addColorStop(0, 'rgba(29,140,248,0)'); //blue colors


    var myChart = new Chart(ctx, {
      type: 'bar',
      responsive: true,
      legend: {
        display: false
      },
      data: {
        labels: ['SETOR-01', 'SETOR-02', 'SETOR-03', 'SETOR-04', 'SETOR-05'],
        datasets: [{
          label: "R$",
          fill: true,
          backgroundColor: gradientStroke,
          hoverBackgroundColor: gradientStroke,
          borderColor: '#1f8ef1',
          borderWidth: 2,
          borderDash: [],
          borderDashOffset: 0.0,
          data: [0, 0, 0, 0, 0],
        }]
      },
      options: gradientBarChartConfiguration
    });
    
    getAnualDado();
    getSaldoMensal();
    getCategoriaDado();
  }

};