import { Chart } from "chart.js/auto";

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const dayOfWeek = [
  { day: 'Thứ 2' },
  { day: 'Thứ 3' },
  { day: 'Thứ 4' },
  { day: 'Thứ 5' },
  { day: 'Thứ 6' },
  { day: 'Thứ 7' },
  { day: 'Chủ nhật' },
];

const fish = [
  { value: 26 },
  { value: 26 },
  { value: 16 },
  { value: 17 },
  { value: 55 },
  { value: 45 },
  { value: 29 },
];

const accessories = [
  { value: 26 },
  { value: 26 },
  { value: 16 },
  { value: 17 },
  { value: 55 },
  { value: 45 },
  { value: 29 },
];

const barChart = document.getElementById('barChart');

if(barChart) {
  (async function() {
    new Chart(barChart, {
      type: 'bar',
      data: {
        labels: dayOfWeek.map(row => row.day),
        datasets: [
          {
            label: 'Cá',
            data: fish.map(row => row.value),
            backgroundColor: 'rgba(54, 162, 235, 0.8)',
            borderColor: 'rgb(54, 162, 235)',
            borderWidth: 2,
            borderRadius: 20,
            barThickness: 20
          },
          {
            label: 'Phụ kiện',
            data: accessories.map(row => row.value),
            backgroundColor: 'rgba(76, 78, 231, 0.8)',
            borderColor: 'rgb(54, 162, 235)',
            borderWidth: 2,
            borderRadius: 20,
            barThickness: 20
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


// Thống kê 7 ngày qua
const dayOfWeekNames = ['Chủ nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7'];
// lấy thời gian hiện tại
const currentDate = new Date();
// lấy số thứ tự ngày trong tuần
const currentDayOfWeek = currentDate.getDay();
// lấy số thứ tự của ngày trong tuần của thời gian hiện tại (0-6 : Chủ nhật - thứ 7) 
const lastWeekStart = new Date(currentDate);

lastWeekStart.setDate(currentDate.getDate() - currentDayOfWeek - 7);

const dayOfMonth = [];
for(let i = 0; i <= 6; i++) {
  const dayOfWeek = (currentDayOfWeek + i) % 7;
  const date = new Date(lastWeekStart);
  date.setDate(date.getDate() + i);
  const dayOfMonthName = dayOfWeekNames[dayOfWeek];
  dayOfMonth.push({ day: dayOfMonthName });
}

const fish1 = [
  { value: 26 },
  { value: 26 },
  { value: 16 },
  { value: 17 },
  { value: 55 },
  { value: 45 },
  { value: 29 },
];

const accessories1 = [
  { value: 26 },
  { value: 26 },
  { value: 16 },
  { value: 17 },
  { value: 55 },
  { value: 45 },
  { value: 29 },
];

const lastSevenDays = document.getElementById('lastSevenDay');

if(lastSevenDays) {
  (async function() {
    new Chart(lastSevenDays, {
      type: 'bar',
      data: {
        labels: dayOfMonth.map(row => row.day),
        datasets: [
          {
            label: 'Cá',
            data: fish1.map(row => row.value),
            backgroundColor: 'rgba(54, 162, 235, 0.8)',
            borderColor: 'rgb(54, 162, 235)',
            borderWidth: 2,
            borderRadius: 20,
            barThickness: 20
          },
          {
            label: 'Phụ kiện',
            data: accessories1.map(row => row.value),
            backgroundColor: 'rgba(76, 78, 231, 0.8)',
            borderColor: 'rgb(54, 162, 235)',
            borderWidth: 2,
            borderRadius: 20,
            barThickness: 20
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


// thống kê theo mốc thời gian

const startDateInput = document.getElementById('start-date');
const endDateInput = document.getElementById('end-date');

function getDaysInRange(startDate, endDate) {
  const dateArray = [];
  // Lặp qua các ngày từ ngày bắt đầu đến ngày kết thúc
  let current = startDate;
  while (current <= endDate) {
    // const dayOfWeekIndex = current.getDay();
    // const dayOfWeek = daysOfWeek[dayOfWeekIndex];

    // Định dạng ngày thành ngày chữ
    // const dayText = dayOfWeek.day;
    const day = `${current.getDate()}/${current.getMonth() + 1}/${current.getFullYear()}`;

    // Thêm vào mảng ngày
    dateArray.push({ day: day });

    // Tăng ngày hiện tại thêm 1 ngày
    current.setDate(current.getDate() + 1);
  }
  return dateArray;
}

const periodChart = document.getElementById('Period');
const loading = $('.loading');

function updateResult() {
  const startDate = new Date(startDateInput.value);
  const endDate= new Date(endDateInput.value);
  const days = getDaysInRange(startDate, endDate);

  const fish2= [
    { value: 26 },
    { value: 26 },
    { value: 16 },
    { value: 17 },
    { value: 55 },
    { value: 45 },
    { value: 29 },
  ];
  
  const accessories2 = [
    { value: 26 },
    { value: 26 },
    { value: 16 },
    { value: 17 },
    { value: 55 },
    { value: 45 },
    { value: 29 },
  ];
  if (periodChartDraw) {
    periodChartDraw.destroy();
    loading.classList.remove('hidden');
  }
  drawChart(days, fish2, accessories2);
  loading.classList.add('hidden');
}
let periodChartDraw;
function drawChart(time, data1, data2) {
  periodChartDraw = new Chart(periodChart, {
    type: 'bar',
    data: {
      labels: time.map(row => row.day),
      datasets: [
        {
          label: 'Cá',
          data: data1.map(row => row.value),
          backgroundColor: 'rgba(54, 162, 235, 0.8)',
          borderColor: 'rgb(54, 162, 235)',
          borderWidth: 2,
          borderRadius: 20,
          barThickness: 20
        },
        {
          label: 'Phụ kiện',
          data: data2.map(row => row.value),
          backgroundColor: 'rgba(76, 78, 231, 0.8)',
          borderColor: 'rgb(54, 162, 235)',
          borderWidth: 2,
          borderRadius: 20,
          barThickness: 20
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
}

let endDateSelected = false;

endDateInput.addEventListener('change', () => {
  endDateSelected = true;
  updateResult()
});

startDateInput.addEventListener('change', () => {
  if(endDateSelected) {
    updateResult();
  }
});

// chuyển đổi các kiểu thống kê

// 1 tuan truoc
const btnlastWeek = $('.btn-last-week-chart');
const lastWeekElement = $('.last-week-chart');

// 7 ngày qua
const btnlastSevenDay = $('.btn-last-seven-day-chart');
const lastSevenDayElement = $('.last-seven-day-chart');

// moc thoi gian
const btnPeriod = $('.btn-period-chart');
const periodElement = $('.period-chart');

// form chọn mốc thời gian
const formPeriod = $('.form-period');

setTimeout(() => {
  lastSevenDayElement.classList.add('hidden');
}, 1);

if(btnlastWeek) {
  btnlastWeek.addEventListener('click', function() {
    lastWeekElement.classList.remove('hidden');
    lastSevenDayElement.classList.add('hidden');
    periodElement.classList.add('hidden');
    formPeriod.classList.add('hidden');
    loading.classList.remove('hidden');
    startDateInput.value = '';
    endDateInput.value = '';
    endDateSelected = false;

    if(periodChartDraw) {
      periodChartDraw.destroy();
    }
    
  });
}

if(btnlastSevenDay) {
  btnlastSevenDay.addEventListener('click', function() {
    lastSevenDayElement.classList.remove('hidden');
    lastWeekElement.classList.add('hidden');
    periodElement.classList.add('hidden');
    formPeriod.classList.add('hidden');
    loading.classList.remove('hidden');
    startDateInput.value = '';
    endDateInput.value = '';
    endDateSelected = false;
    
    if(periodChartDraw) {
      periodChartDraw.destroy();
    }
  });
}

if(btnPeriod) {
  btnPeriod.addEventListener('click', function() {
    periodElement.classList.remove('hidden');
    formPeriod.classList.remove('hidden');
    lastWeekElement.classList.add('hidden');
    lastSevenDayElement.classList.add('hidden');
  });
}

