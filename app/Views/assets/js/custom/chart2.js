var options1 = {
    chart: { type: 'line', height: 350 },
    series: [{ name: 'Ventas', data: [10, 20, 15, 40, 55, 30, 60] }],
    xaxis: { categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio'] }
  };
  var chart1 = new ApexCharts(document.querySelector("#line-chart"), options1);
  chart1.render();

  // Gráfico de Barras
  var options2 = {
    chart: { type: 'bar', height: 350 },
    series: [{ name: 'Puntajes', data: [10, 20, 30, 40, 50] }],
    xaxis: { categories: ['A', 'B', 'C', 'D', 'E'] }
  };
  var chart2 = new ApexCharts(document.querySelector("#bar-chart"), options2);
  chart2.render();

  // Gráfico Circular
  var options3 = {
    chart: { type: 'pie', height: 350 },
    series: [45, 25, 15, 15],
    labels: ['Comida', 'Transporte', 'Entretenimiento', 'Otros']
  };
  var chart3 = new ApexCharts(document.querySelector("#pie-chart"), options3);
  chart3.render();

  // Gráfico de Áreas
  var options4 = {
    chart: { type: 'area', height: 350 },
    series: [{ name: 'Ingresos', data: [10, 25, 15, 30, 50, 35, 60] }],
    xaxis: { categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio'] }
  };
  var chart4 = new ApexCharts(document.querySelector("#area-chart"), options4);
  chart4.render();

