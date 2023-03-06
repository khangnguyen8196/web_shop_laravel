const firebaseConfig = {
    apiKey: "AIzaSyCuIuXdVeExd208bHN0gWaJwhB75vH81zs",
    authDomain: "fln-dev.firebaseapp.com",
    projectId: "fln-dev",
    storageBucket: "fln-dev.appspot.com",
    messagingSenderId: "705808368844",
    appId: "1:705808368844:web:7eaf6283d7db2faf6bee69",
    measurementId: "G-CBVJNW9NX8"
};
firebase.initializeApp(firebaseConfig);
jQuery(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function sendTokenToServer(token){
        $.ajax({
            url: '/update-fb-token',
            data: {
                'accid': accid,
                'fb_token': token
            },
            type: 'POST',
            dataType: 'json',
        });
    }
    if( firebase.messaging.isSupported() && typeof accid != undefined && parseInt(accid) > 0){
        const messaging = firebase.messaging();
        if( 'serviceWorker' in navigator ){
            const messaging = firebase.messaging();
            function initNotification(){
                navigator.serviceWorker.register('/frontend/assets/js/service-worker.js')
                    .then(function(registration){
                        registration.update();
                        // register service worker
                        messaging.useServiceWorker(registration);
                        // on messaging
                        messaging.onTokenRefresh(function(token){
                            console.log(token);
                            sendTokenToServer(token);
                        });
                        messaging.onMessage(function (payload) {
                            var notification = JSON.parse(payload.data.notification);
                            // plus quantity notify of bell
                            var number_notify = parseInt($('#number_notify').attr('data-number'));
                            if (number_notify == 0){
                                $('#number_notify').addClass('badge');
                            }
                            $('#number_notify').attr('data-number',number_notify+1);
                            if (number_notify+1 > 9) {
                                $('#number_notify').text('9+');
                            } else {
                                $('#number_notify').text(number_notify + 1);
                            }
                            // refresh list notify
                            $('#notify_list').DataTable().draw();

                            // var options = {
                            //     body: notification.body,
                            //     icon: '/frontend/assets/images/logo.png',
                            // };
                            if( accid == notification.account_id ){

                            }
                        });
                        messaging.requestPermission()
                            .then(function () {
                                return messaging.getToken(true);
                            })
                            .then(function (currentToken) {
                                console.log(currentToken);
                                sendTokenToServer(currentToken);
                            })
                            .catch(function (err) {
                                console.log('An error occurred while retrieving token. ', err);
                            });
                    }).catch(function(err){
                    console.log('Service Worker Error', err);
                });
            }
            window.addEventListener('load', function () {
                initNotification();
            });
        }
    } else {
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function () {
                navigator.serviceWorker.register("/frontend/assets/js/service-worker.js").then(function (registration) {
                    registration.update();
                    // registration..postMessage({'is_login': 0 });
                    console.log("Service Worker registered! no login Scope: ".concat(registration.scope));
                }).catch(function (err) {
                    console.log("Service Worker registration failed: ".concat(err));
                });
            });
        }
    }
});
