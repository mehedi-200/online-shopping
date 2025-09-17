// function showContacts() {
//     document.getElementById('sidebar').classList.add('active');
//     document.getElementById('chatArea').style.display = 'none';
// }
//
// function showChat(contactName) {
//     document.getElementById('chatPartnerName').textContent = contactName;
//
//     // On mobile, hide sidebar and show chat
//     if (window.innerWidth <= 992) {
//         document.getElementById('sidebar').classList.remove('active');
//         document.getElementById('chatArea').style.display = 'flex';
//     }
//
//     // In a real app, you would load the chat history for this contact here
// }
//
// function initView() {
//     if (window.innerWidth <= 992) {
//         document.getElementById('sidebar').classList.add('active');
//         document.getElementById('chatArea').style.display = 'none';
//     } else {
//         document.getElementById('sidebar').classList.remove('active');
//         document.getElementById('chatArea').style.display = 'flex';
//     }
// }
//
// // Initialize and handle window resize
// window.addEventListener('load', initView);
// window.addEventListener('resize', initView);
