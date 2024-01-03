
import Echo from 'laravel-echo';
window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true,
});

const userId = document.querySelector('meta[name="user-id"]').getAttribute('content');
window.Echo.private('support.' + userId).listen('supportConversationStarted', (event) => {
    console.log('Nueva conexión de soporte iniciada:', event);
});
