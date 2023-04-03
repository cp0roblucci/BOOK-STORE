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

const btnBarChart = $('.btn-bar-chart');
const barChartElement = $('.bar-chart');

if(barChart) {
  btnBarChart.addEventListener('click', function() {
    barChartElement.classList.remove('hidden');
    lineChartElement.classList.add('hidden');
  });
}
