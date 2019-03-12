import firebase from 'firebase'

if (!firebase.apps.length) {
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyA6h1RawxD9aDiz_UosiQEaNb-ZSFXAxJY",
        authDomain: "bookshelf-app-92d95.firebaseapp.com",
        databaseURL: "https://bookshelf-app-92d95.firebaseio.com",
        projectId: "bookshelf-app-92d95",
        storageBucket: "bookshelf-app-92d95.appspot.com",
        messagingSenderId: "480065631128"
    };
    firebase.initializeApp(config);
}
export default firebase



