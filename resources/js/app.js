import './bootstrap'
import Alpine from 'alpinejs';
import ApexCharts from 'apexcharts';

window.Alpine = Alpine;

Alpine.start();

var pieChart = {
    chart: {
        type: 'donut',
        height: 400,
        width: 600
    },
    series: series,
    labels: labels,
    theme: {
        mode: 'light', 
        palette: 'palette10', 
        monochrome: {
            enabled: false,
            color: '#255aee',
            shadeTo: 'light',
            shadeIntensity: 0.65
        },
    }
}

var barGraph = {
    chart: {
        type: 'bar'
    },
    series: [{
        name: 'tickets resolved',
        data: data
    }],
    xaxis: {
        categories: label
    },
    theme: {
        mode: 'light', 
        palette: 'palette2', 
        monochrome: {
            enabled: false,
            color: '#255aee',
            shadeTo: 'light',
            shadeIntensity: 0.65
        },
    }
}

var chart = new ApexCharts(document.getElementById("chart"), pieChart);
var chart2 = new ApexCharts(document.getElementById("chart2"), barGraph);

chart.render();
chart2.render();
