"use strict";
importScripts('https://www.gstatic.com/firebasejs/8.7.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.7.1/firebase-messaging.js');
firebase.initializeApp({
    apiKey: "AIzaSyCuIuXdVeExd208bHN0gWaJwhB75vH81zs",
    authDomain: "fln-dev.firebaseapp.com",
    projectId: "fln-dev",
    storageBucket: "fln-dev.appspot.com",
    messagingSenderId: "705808368844",
    appId: "1:705808368844:web:7eaf6283d7db2faf6bee69",
    measurementId: "G-CBVJNW9NX8"
});
function getPathFromUrl(url) {
    return url.split(/[?#]/)[0];
}
if( firebase.messaging.isSupported()){
    const messaging = firebase.messaging();
    messaging.setBackgroundMessageHandler(function(payload) {
        var data = JSON.parse(payload.data.notification);
        console.log(data);
        // Customize notification here
        const notificationTitle = data.title;
        var url = '/profile/notify';
        const notificationOptions = {
            body: data.body,
            icon: '/frontend/assets/images/logo.png',
            data: {
                url: url
            }
        };
        return self.registration.showNotification(notificationTitle,
            notificationOptions);

    });

    self.addEventListener('notificationclick',function(event) {
        var focusUrl= event.notification.data.url;
        var type = event.notification.data;
        event.notification.close();
        if( focusUrl == undefined ) return null;
        if( type == undefined) return null;
        if(focusUrl!=='') {
            event.waitUntil(self.clients.matchAll({
                includeUncontrolled: true
            }).then(function(clientList) {
                for(var i=0;i<clientList.length;i++) {
                    var client=clientList[i];
                    if(getPathFromUrl(client.url)===getPathFromUrl(focusUrl)&&'focus' in client)
                        return client.focus();
                }
                if(self.clients.openWindow)
                    return self.clients.openWindow(focusUrl);
                return null;
            }));
        }
        return null;
    });
}

self.addEventListener('install', function(event) {
    console.log('[Service Worker] Installing Service Worker ...', event);
});
self.addEventListener('activate', function(event) {
    console.log('[Service Worker] Activating Service Worker ....', event);
});
