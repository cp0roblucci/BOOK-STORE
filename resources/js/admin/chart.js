import { Chart } from "chart.js/auto";

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

// chart element
const lastWeekChart = document.getElementById('lastWeekChart');
const lastSevenDaysChart = document.getElementById('lastSevenDay');
const periodChart = document.getElementById('Period');

const loading1 = $('.loading1');
const loading2 = $('.loading2');
const loading3 = $('.loading3');

// 3 bien luu 3 bieu do khi duoc ve ra
let lastWeekChartDraw;
let lastSevenDayChartDraw;
let periodChartDraw;

const dayOfWeek = [
  { day: 'Thứ 2' },
  { day: 'Thứ 3' },
  { day: 'Thứ 4' },
  { day: 'Thứ 5' },
  { day: 'Thứ 6' },
  { day: 'Thứ 7' },
  { day: 'Chủ nhật' },
];

const dataFish = [
  { value: 26 },
  { value: 26 },
  { value: 16 },
  { value: 17 },
  { value: 55 },
  { value: 45 },
  { value: 29 },
];

const dataAccessories = [
  { value: 26 },
  { value: 26 },
  { value: 16 },
  { value: 17 },
  { value: 55 },
  { value: 45 },
  { value: 29 },
];

// draw chart function
function drawChart(chartElement, time, dataFish, dataAccessories) {
  const ctx = chartElement.getContext('2d');
  const chart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: time.map(row => row.day),
      datasets: [
        {
          label: 'Cá',
          data: dataFish.map(row => row.value),
          backgroundColor: 'rgba(54, 162, 235, 0.8)',
          borderColor: 'rgb(54, 162, 235)',
          borderWidth: 2,
          borderRadius: 20,
          barThickness: 20
        },
        {
          label: 'Phụ kiện',
          data: dataAccessories.map(row => row.value),
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

  return chart;
}

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

// // không ẩn ngay từ ban đầu, bị vỡ
// setTimeout(() => {
//   lastSevenDayElement.classList.add('hidden');
// }, 1);

if (lastWeekChart) {
  lastWeekChartDraw = drawChart(lastWeekChart, dayOfWeek, dataFish, dataAccessories);
}

if(btnlastWeek) {
  btnlastWeek.addEventListener('click', function() {
    // những xử lí của biểu đồ này
    lastWeekElement.classList.remove('hidden');
    lastSevenDayElement.classList.add('hidden');
    
    // fake delay loading
    setTimeout(() => {
      if (lastWeekChartDraw) {
        lastWeekChartDraw.destroy();
      }
      if (lastWeekChart) {
        lastWeekChartDraw = drawChart(lastWeekChart, dayOfWeek, dataFish, dataAccessories);
        if (lastSevenDayChartDraw) {
          lastSevenDayChartDraw.destroy();
        }
        if (periodChartDraw) {
          periodChartDraw.destroy();
        }
      }
    loading1.classList.add('hidden');
    }, 1000);
    // những xử lí của các biểu đồ còn lại
    periodElement.classList.add('hidden');
    formPeriod.classList.add('hidden');
    loading2.classList.remove('hidden');
    loading3.classList.remove('hidden');

    // khi chuyển biểu đồ đặt lại mốc thời gian ban đầu (chưa chọn)
    startDateInput.value = '';
    endDateInput.value = '';
    endDateSelected = false;
    if(periodChartDraw) {
      periodChartDraw.destroy();
    }
  });
}

// // Thống kê 7 ngày qua
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
if(btnlastSevenDay) {
  btnlastSevenDay.addEventListener('click', function() {
    // những xử lí của biểu đồ này
    lastSevenDayElement.classList.remove('hidden');
    lastWeekElement.classList.add('hidden');

    // fake delay loading
    setTimeout(() => {
      if (lastSevenDayChartDraw) {
        lastSevenDayChartDraw.destroy();
      }
      if (lastSevenDaysChart) {
        lastSevenDayChartDraw = drawChart(lastSevenDaysChart, dayOfMonth, dataFish, dataAccessories);
        if (lastWeekChartDraw) {
          lastWeekChartDraw.destroy();
        }
        if (periodChartDraw) {
          periodChartDraw.destroy();
        }
      }
      loading2.classList.add('hidden');
    }, 1000);

    // những xử lí của các biểu đồ còn lại
    periodElement.classList.add('hidden');
    formPeriod.classList.add('hidden');
    loading1.classList.remove('hidden');
    loading3.classList.remove('hidden');
    startDateInput.value = '';
    endDateInput.value = '';
    endDateSelected = false;
    
    // if(periodChartDraw) {
    //   periodChartDraw.destroy();
    // }
  });
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

function updateResult() {
  const startDate = new Date(startDateInput.value);
  const endDate= new Date(endDateInput.value);
  const days = getDaysInRange(startDate, endDate);
  if (periodChartDraw) {
    periodChartDraw.destroy();
    loading3.classList.remove('hidden');
  }
  periodChartDraw = drawChart(periodChart, days, dataFish, dataAccessories);
  loading3.classList.add('hidden');
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

if(btnPeriod) {
  btnPeriod.addEventListener('click', function() {
    periodElement.classList.remove('hidden');
    formPeriod.classList.remove('hidden');
    lastWeekElement.classList.add('hidden');
    lastSevenDayElement.classList.add('hidden');

    if (lastWeekChartDraw) {
      lastWeekChartDraw.destroy();
    }
    if (lastSevenDayChartDraw) {
      lastSevenDayChartDraw.destroy();
    }

    loading1.classList.remove('hidden');
    loading2.classList.remove('hidden');
  });
}


// if(barChart) {
//   (async function() {
//     new Chart(barChart, {
//       type: 'bar',
//       data: {
//         labels: dayOfWeek.map(row => row.day),
//         datasets: [
//           {
//             label: 'Cá',
//             data: fish.map(row => row.value),
//             backgroundColor: 'rgba(54, 162, 235, 0.8)',
//             borderColor: 'rgb(54, 162, 235)',
//             borderWidth: 2,
//             borderRadius: 20,
//             barThickness: 20
//           },
//           {
//             label: 'Phụ kiện',
//             data: accessories.map(row => row.value),
//             backgroundColor: 'rgba(76, 78, 231, 0.8)',
//             borderColor: 'rgb(54, 162, 235)',
//             borderWidth: 2,
//             borderRadius: 20,
//             barThickness: 20
//           }
//         ],
//       },

//       options: {
//         scales: {
//           y: {
//             beginAtZero: true
//           },
//         },
//         plugins: {
//           legend: {
//             labels: {
//               font: {
//                 size: 16,
//                 style: 'italic',
//               }
//             }
//           }
//         },
//         responsive: true,
//         maintainAspectRatio: true,
//         // aspectRatio: 2,
//         height: 10,
//         width: 200,
//       }
//     });
//   })();
// }


// if(lastSevenDays) {
//   (async function() {
//     new Chart(lastSevenDays, {
//       type: 'bar',
//       data: {
//         labels: dayOfMonth.map(row => row.day),
//         datasets: [
//           {
//             label: 'Cá',
//             data: fish1.map(row => row.value),
//             backgroundColor: 'rgba(54, 162, 235, 0.8)',
//             borderColor: 'rgb(54, 162, 235)',
//             borderWidth: 2,
//             borderRadius: 20,
//             barThickness: 20
//           },
//           {
//             label: 'Phụ kiện',
//             data: accessories1.map(row => row.value),
//             backgroundColor: 'rgba(76, 78, 231, 0.8)',
//             borderColor: 'rgb(54, 162, 235)',
//             borderWidth: 2,
//             borderRadius: 20,
//             barThickness: 20
//           }
//         ],
//       },

//       options: {
//         scales: {
//           y: {
//             beginAtZero: true
//           },
//         },
//         plugins: {
//           legend: {
//             labels: {
//               font: {
//                 size: 16,
//                 style: 'italic',
//               }
//             }
//           }
//         },
//         responsive: true,
//         maintainAspectRatio: true,
//         // aspectRatio: 2,
//         height: 10,
//         width: 200,
//       }
//     });
//   })();
// }


