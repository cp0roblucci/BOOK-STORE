// header dropdown

const iconDropdown = document.querySelector('.icon-dropdown');
const menuDropdown = document.querySelector('.menu-dropdown');

iconDropdown.addEventListener('click', function() {
  menuDropdown.classList.toggle('hidden');
});

// khi nguoi dung click ra ngoai man hinh thi dong dropdown
window.onclick = function(e) {
  if(!e.target.matches('.icon-dropdown') && !e.target.matches('.icon-menudropdown')) {
    if(!menuDropdown.classList.contains('hidden')) {
      menuDropdown.classList.add('hidden');
    }
  }
}



const clickDropDown = document.querySelector('.click_dropdown-sidebar');
const dropdownSidebar = document.querySelector('.dropdown__siderbar');

clickDropDown.addEventListener('click', function() {
  dropdownSidebar.classList.toggle('hidden');
});

// // khi nguoi dung click ra ngoai man hinh thi dong dropdown
// window.onclick = function(e) {
//   if(!e.target.matches('.click_dropdown-sidebar') && !e.target.matches('.click_dropdown-sidebar-span')) {
//     if(!dropdownSidebar.classList.contains('hidden')) {
//       dropdownSidebar.classList.add('hidden');
//     }
//   }
// }


