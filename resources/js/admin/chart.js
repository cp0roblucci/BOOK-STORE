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


const barChart = document.getElementById('barChart');

if(barChart) {
  (async function() {
    new Chart(barChart, {
      type: 'bar',
      data: {
        labels: data.map(row => row.year),
        datasets: [
          {
            label: 'Product Statistics',
            data: data.map(row => row.value),
            backgroundColor: [
              'rgba(153, 102, 255, 0.5)',
              'rgba(54, 162, 235, 0.5)',
              'rgba(153, 102, 255, 0.5)',
              'rgba(54, 162, 235, 0.5)',
              'rgba(153, 102, 255, 0.5)',
              'rgba(54, 162, 235, 0.5)',
              'rgba(153, 102, 255, 0.5)',
              'rgba(54, 162, 235, 0.5)',
              'rgba(153, 102, 255, 0.5)',
              'rgba(54, 162, 235, 0.5)',
            ],
            // backgroundColor: function(context) {
            //   const index = context.dataIndex;
            //   const value = context.dataset.data[index];
            //   return value < 5 ? 'red' : index % 2 ? 'rgba(54, 162, 235, 0.5)' : 'rgba(153, 102, 255, 0.5)';
            // },
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
          }
          
        ]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
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
        }
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
