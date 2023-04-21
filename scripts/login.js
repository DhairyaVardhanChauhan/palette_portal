const firebaseConfig = {
    apiKey: "AIzaSyDoi9sLiRr76KitZHQyuqypaNzsXI4a8ZU",
    authDomain: "palette-portal-d27eb.firebaseapp.com",
    databaseURL: "https://palette-portal-d27eb-default-rtdb.firebaseio.com",
    projectId: "palette-portal-d27eb",
    storageBucket: "palette-portal-d27eb.appspot.com",
    messagingSenderId: "164188635681",
    appId: "1:164188635681:web:0c63619ab8776d71145960"
};

firebase.initializeApp(firebaseConfig);
var contactFormDB = firebase.database().ref("contactForm");
document.getElementById("contactForm").addEventListener("submit",submitForm);

function submitForm(e){
    e.preventDefault();
    var name = getElementVal("name");
    var password = getElementVal("password");
    console.log(name,password);
    saveMessages(name,password);
}

const saveMessages = (name,password)=>{
    var newContactForm = contactFormDB.push(); 
    newContactForm.set({
        name: name,
        password: password,
    });
};

const getElementVal = (id) =>{
    return document.getElementById(id).value;
};
