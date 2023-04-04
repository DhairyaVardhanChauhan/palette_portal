// Typer
window.ityped.init(document.querySelector('.display-text'), {
    strings: ['Create', 'Buy', 'Sell', 'Explore'],
    typeSpeed: 150,
    backSpeed: 200,
    backDelay: 3000,
    loop: true
})

// Search Bar
let suggestions = [
    'modern art',
    'realistic art',
    'Leonardo Da Vinci',
    'Vincent van Gogh',
    'Pablo Picasso',
    'Rembrandt',
    'Johannes Vermeer',
    'renault',
    'remembrance'
];

// getting all required elements
const searchWrapper = document.querySelector(".search-input");
const inputBox = searchWrapper.querySelector("input");
const suggBox = searchWrapper.querySelector(".autocom-box");

// if user press any key and release
inputBox.onkeyup = (e) => {
    let userData = e.target.value; //user enetered data
    let emptyArray = [];
    if (userData) {
        emptyArray = suggestions.filter((data) => {
            //filtering array value and user characters to lowercase and return only those words which are start with user enetered chars
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
        });
        emptyArray = emptyArray.map((data) => {
            // passing return data inside li tag
            return data = `<li>${data}</li>`;
        });
        searchWrapper.classList.add("active"); //show autocomplete box
        showSuggestions(emptyArray);
        let allList = suggBox.querySelectorAll("li");
        for (let i = 0; i < allList.length; i++) {
            //adding onclick attribute in all li tag
            allList[i].setAttribute("onclick", "select(this)");
        }
    } else {
        searchWrapper.classList.remove("active"); //hide autocomplete box
    }
}

function select(element) {
    let selectData = element.textContent;
    inputBox.value = selectData;
    searchWrapper.classList.remove("active");
}

function showSuggestions(list) {
    let listData;
    if (!list.length) {
        userValue = inputBox.value;
        listData = `<li>${userValue}</li>`;
    } else {
        listData = list.join('');
    }
    suggBox.innerHTML = listData;
}

function hideBar() {
    searchWrapper.classList.remove("active");
}

function showBar() {
    searchWrapper.classList.add("active");
}

// Arts height adjust
const arts = document.querySelectorAll('.art');

arts.forEach(art => {
    art.style.height = art.clientWidth + 'px';
})

addEventListener("resize", () => {
    arts.forEach(art => {
        art.style.height = art.clientWidth + 'px';
    })
})

// Image inserter
let images = [];
for (let i = 1; i <= 6; i++) {
    images.push(`../assets/img${i}.jpg`)
}

// shuffles images
images = images.sort((a, b) => 0.5 - Math.random());


arts.forEach((art, i) => {
    art.style.backgroundImage = `url(${images[i]})`;
})