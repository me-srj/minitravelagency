// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.
importScripts('https://www.gstatic.com/firebasejs/4.8.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/4.8.1/firebase-messaging.js');


 const firebaseConfig = {
  apiKey: "APIKEY",
  authDomain: "authdomain",
  databaseURL: "DBURL",
  projectId: "test-f1857",
  storageBucket: "test-f1857.appspot.com",
  messagingSenderId: "MESSAGINGGSENDID",
  appId: "1:1054012487170:web:3b27245c81992785aa591b"
};
firebase.initializeApp(firebaseConfig);
//new
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
// console.log('[firebase-messaging-sw.js] Received background message ', payload);
// Customize notification here
const notificationTitle = payload.data.title;
const notificationOptions = {
body: payload.data.body,
  icon: payload.data.icon,
  image: payload.data.image,
  click_action: "https://minitravelagency.com/"+ payload.data.url, // To handle notification click when notification is moved to notification tray
data: {
click_action: "https://minitravelagency.com/"+ payload.data.url
}
};
self.addEventListener('notificationclick', function(event) {
//  console.log(event.action.data.click_action);
if (!event.action) {
// console.log('Notification Click.');
self.clients.openWindow(event.notification.data.click_action, '_blank')
event.notification.close();
return;
}else{
event.notification.close();
}
});
return self.registration.showNotification(notificationTitle,
notificationOptions);
});