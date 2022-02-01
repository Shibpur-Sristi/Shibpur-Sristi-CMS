<script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-firestore.js"></script>
<script src="./js/scripts.js"></script>
<script src="./js/auth.js"></script>

<script>
const firebaseConfig = {
    apiKey: "AIzaSyAk5oA1ZFAB64jPKVKIds-ZcF2DIAjpEUA",
    authDomain: "shibpur-sristi-cms.firebaseapp.com",
    projectId: "shibpur-sristi-cms",
    storageBucket: "shibpur-sristi-cms.appspot.com",
    messagingSenderId: "679486375175",
    appId: "1:679486375175:web:927289eb829b53ec5f31a2"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

const auth = firebase.auth();
const db = firebase.firestore();

db.settings({
    timestampInSpanshots: true
});
</script>