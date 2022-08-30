var morrisLine;
var morrisBar;
var morrisDonut;
var morrisArea;

function init_lineChart(data){
    if ($('#chartLine').length && !$('#chartLine svg').length){
        morrisLine = Morris.Line({
          element: 'chartLine',
          xkey: 'year',
          ykeys: ['value'],
          labels: true,
          hideHover: 'auto',
          lineColors: ['#1e87f0'],
          gridTextColor: '#aaaaaa',
          gridTextSize: 14,
          gridTextFamily: 'Arial',
          data: data,
          hoverCallback: function(index, options, content) {
                return(options.data[index].value);
            },
          resize: true,
        });
    }
}
function init_barChart(data){
    if ($('#chartBar').length && !$('#chartBar svg').length){
            
        morrisBar = Morris.Bar({
          element: 'chartBar',
          xkey: 'year',
          ykeys: ['value'],
          labels: true,
          lineColors: ['#1e87f0'],
          gridTextColor: '#aaaaaa',
          gridTextSize: 14,
          gridTextFamily: 'Arial',
          resize: true,
          data: data,
          hoverCallback: function(index, options, content) {
                return(options.data[index].value);
            },
        });
    }
}
function init_DonutChart(data){
    if ($('#chartDonut').length && !$('#chartDonut svg').length){

        morrisDonut = Morris.Donut({
          element: 'chartDonut',
          data: data,
          formatter: function (x) { return x + "%"}
        }).on('click', function(i, row){
          console.log(i, row);
        });

    }
}
function init_DonutArea(data){
    if ($('#chartArea').length && !$('#chartArea svg').length){

        morrisArea = Morris.Area({
          element: 'chartArea',
          xkey: 'x',
          ykeys: ['y','z'],
          labels: ['Y', 'Z'],
          gridTextSize: 14,
          gridTextFamily: 'Arial',
          resize: true,
          data: data,
        });

    }
}

function init_chart() {
    var data = [
        {year: '2011', value: 20},
        {year: '2012', value: 20},
        {year: '2013', value: 10},
        {year: '2014', value: 5},
        {year: '2015', value: 5},
        {year: '2016', value: 18},
        {year: '2017', value: 20},
    ];
    var data2 = [
        {value: 70, label: '2011'},
        {value: 15, label: '2012'},
        {value: 10, label: '2013'},
        {value: 5, label: '2014'}
    ];
    var data3 = [
      {x: '2010 Q4', y: 3, z: 7},
      {x: '2011 Q1', y: 3, z: 4},
      {x: '2011 Q2', y: null, z: 1},
      {x: '2011 Q3', y: 2, z: 5},
      {x: '2011 Q4', y: 8, z: 2},
      {x: '2012 Q1', y: 4, z: 4}
    ];
    init_lineChart(data);
    init_barChart(data);
    init_DonutChart(data2);
    init_DonutArea(data3);
}

function charts_refresh() {
    $('#chartBar, #chartLine').removeAttr('style').html('');
    init_chart();
}

$(document).ready(function(){
    init_chart();
});