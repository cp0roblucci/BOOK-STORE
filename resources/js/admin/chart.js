import { Chart } from "chart.js/auto";

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const data = [
  { year: 'January', value: 24 }, 
  { year: 'February', value: 95 }, 
  { year: 'March', value: 16 }, 
  { year: 'April', value: 28 }, 
  { year: 'May', value: 50 }, 
  { year: 'June', value: 4 }, 
  { year: 'July', value: 72 }, 
  { year: 'August', value: 24 }, 
  { year: 'September', value: 3 }, 
  { year: 'October', value: 85 }, 
  { year: 'November', value: 47 }, 
  { year: 'December', value: 16 }
];

const data2 = [
  { year: 'January', value: 26 }, 
  { year: 'February', value: 26 }, 
  { year: 'March', value: 16 }, 
  { year: 'April', value: 17 }, 
  { year: 'May', value: 55 }, 
  { year: 'June', value: 45 }, 
  { year: 'July', value: 29 }, 
  { year: 'August', value: 24 }, 
  { year: 'September', value: 19 }, 
  { year: 'October', value: 24 }, 
  { year: 'November', value: 16 }, 
  { year: 'December', value: 47 }
];


const barChart = document.getElementById('barChart');

if(barChart) {
  (async function() {
    new Chart(barChart, {
      type: 'bar',
      data: {
        labels: data.map(row => row.year),
        datasets: [
          {
            label: 'Fish Statistics',
            data: data.map(row => row.value),
            backgroundColor: 'rgba(54, 162, 235, 0.8)',
            borderColor: 'rgb(54, 162, 235)',
            borderWidth: 1,
            borderRadius: 10,
            barThickness: 10
          },
          {
            label: 'Accessories Statistics',
            data: data2.map(row => row.value),
            backgroundColor: 'rgba(76, 78, 231, 0.8)',
            borderColor: 'rgb(54, 162, 235)',
            borderWidth: 1,
            borderRadius: 10,
            barThickness: 10
          }
        ],
      },
      
      
      options: {
        scales: {
          y: {
            beginAtZero: true
          },
        },
        plugins: {
          legend: {
            labels: {
              font: {
                size: 16,
                style: 'italic',
              }
            }
          }
        },
        responsive: true,
        maintainAspectRatio: true,
        // aspectRatio: 2,
        height: 10,
        width: 200,
      }
    });
  })();
}


const lineChart = document.getElementById('lineChart');

(async function() {
  new Chart(lineChart, {
    type: 'line',
    data: {
      labels: data.map(row => row.year),
      datasets: [
        {
          label: 'Product Statistics',
          data: data.map(row => row.value),
          fill: false,
          borderColor: [
            'rgb(153, 102, 255)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(54, 162, 235)',
          ],
          borderWidth: 1,
        },
        {
          label: 'Accessories Statistics',
          data: data2.map(row => row.value),
          backgroundColor: 'rgba(76, 78, 231, 0.8)',
          borderColor: 'rgb(54, 162, 235)',
          borderWidth: 1,
          borderRadius: 10,
          barThickness: 10
        }
      ],
      
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        },
        x: {
          grid: {
            offset: true
          }
        }
        
      },
      plugins: {
        legend: {
          labels: {
            font: {
              size: 16,
              style: 'italic'
            }
          }
        }
      }
    }
  });
})();

const btnBarChart = $('.btn-bar-chart');
const btnLineChart = $('.btn-line-chart');

const barChartElement = $('.bar-chart');
const lineChartElement = $('.line-chart');

if(barChart) {
  btnBarChart.addEventListener('click', function() {
    barChartElement.classList.remove('hidden');
    lineChartElement.classList.add('hidden');
  });
}

if(btnLineChart) {
  btnLineChart.addEventListener('click', function() {
    barChartElement.classList.add('hidden');
    lineChartElement.classList.remove('hidden');
  });
}
