window.ityped.init(document.querySelector('.display-text'), {
    strings: ['Create', 'Buy', 'Sell', 'Explore'],
    typeSpeed: 150,
    backSpeed: 200,
    backDelay: 3000,
    loop: true
})  
// Search Bar
let suggestions = [
    'Leonardo Da Vinci','Vincent van Gogh', 'Pablo Picasso', 'Claude Monet', 'Michelangelo', 'Salvador Dali', 'Frida Kahlo', 'Jackson Pollock', 'Georgia O\'Keeffe',
    'Gustav Klimt', 'Edvard Munch', 'Henri Matisse', 'Raphael', 'Rembrandt', 'Paul Cezanne', 'Edgar Degas', 'Paul Gauguin', 'Marc Chagall', 'Diego Rivera',
    'Henri Rousseau', 'Joan Miro', 'Amedeo Modigliani', 'Mark Rothko', 'Wassily Kandinsky', 'Norman Rockwell', 'Roy Lichtenstein', 'Jean-Michel Basquiat', 'Keith Haring', 'Cindy Sherman',
    'Yayoi Kusama', 'Willem de Kooning', 'Anselm Kiefer', 'Kazimir Malevich', 'Jasper Johns', 'David Hockney', 'Francis Bacon', 'Hieronymus Bosch', 'Bridget Riley', 'Jean Dubuffet',
    'Johannes Vermeer', 'Titian', 'Diego Velazquez', 'Francisco Goya', 'Caravaggio', 'El Greco', 'Pieter Bruegel the Elder', 'Albrecht Durer', 'Jan van Eyck', 'Peter Paul Rubens',
    'Jan Vermeer van Delft', 'Georges Seurat', 'M.C. Escher', 'Robert Rauschenberg', 'Frank Stella', 'Richard Serra', 'René Magritte', 'Grant Wood', 'Thomas Hart Benton', 'Andrew Wyeth',
    'Jamie Wyeth', 'Karel Appel', 'Lucian Freud', 'H.R. Giger', 'Christo and Jeanne-Claude', 'Jeff Koons', 'Damien Hirst', 'Marcel Duchamp', 'Man Ray', 'Georg Baselitz',
    'Chuck Close', 'Jean Tinguely', 'Sol LeWitt', 'Frank Gehry', 'Arshile Gorky', 'Joseph Cornell', 'Romare Bearden', 'David Smith', 'Alex Katz',
    'Ellsworth Kelly', 'Robert Motherwell', 'Willem de Kooning', 'Isamu Noguchi', 'Helen Frankenthaler', 'Cy Twombly', 'Barnett Newman', 'Clyfford Still', 'Morris Louis', 'Richard Diebenkorn',
    'Joan Mitchell', 'Sam Francis', 'Wayne Thiebaud', 'Philip Guston', 'Mark Tobey', 'Robert Irwin', 'Samuel Morse', 'John Singleton Copley', 'Gilbert Stuart', 'Thomas Cole',
    'Frederic Edwin Church', 'Albert Bierstadt', 'Winslow Homer', 'John Singer Sargent', 'Mary Cassatt', 'Childe Hassam', 'James Abbott McNeill Whistler', 'Edward Hopper', 'Grant Wood', 'Edward Hicks',
    'Romare Bearden', 'Jacob Lawrence', 'Norman Rockwell', 'Andy Warhol','Donald Judd', 'Agnes Martin',
    , 'Barnett Newman',
];
// getting all required elements
const searchWrapper = document.querySelector(".search-input");
const inputBox = searchWrapper.querySelector("input");
const suggBox = searchWrapper.querySelector(".autocom-box");

// if user presses any key and releases
inputBox.addEventListener("input", (e) => {
    let userData = e.target.value; //user entered data
    let emptyArray = [];
    if (userData) {
        emptyArray = suggestions.filter((data) => {
            //filtering array value and user characters to lowercase and return only those words which start with user entered chars
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
        });
        emptyArray = emptyArray.map((data) => {
            //passing return data inside li tag with anchor tag and href attribute
            return `<li><a href="https://en.wikipedia.org/wiki/${encodeURIComponent(data.replace(/\s+/g, '_'))}" target="_blank" rel="noopener noreferrer" style="text-decoration: none; color: white">${data}</a></li>`;
        });
        searchWrapper.classList.add("active"); //show autocomplete box
        showSuggestions(emptyArray);
    } else {
        searchWrapper.classList.remove("active"); //hide autocomplete box
    }
});

// Event delegation for capturing click events on suggestions
suggBox.addEventListener("click", (e) => {
    if (e.target.tagName === "A") {
        searchWrapper.classList.remove("active");
        inputBox.value = e.target.textContent; // set selected suggestion as input value
    }
});

// Event listener for Enter key press on input box
inputBox.addEventListener("keydown", (e) => {
    if (e.key === "Enter") {
        let userValue = inputBox.value;
        let matchedSuggestion = suggestions.find((suggestion) => {
            return suggestion.toLowerCase() === userValue.toLowerCase();
        });
        if (matchedSuggestion) {
            window.open(`https://en.wikipedia.org/wiki/${matchedSuggestion.replace(/\s+/g, '_')}`, "_blank");
        }
    } else if (e.key === "ArrowDown") {
        e.preventDefault();
        const activeSuggestion = suggBox.querySelector(".active");
        if (activeSuggestion) {
            activeSuggestion.nextElementSibling.classList.add("active");
            activeSuggestion.classList.remove("active");
            inputBox.value = activeSuggestion.nextElementSibling.querySelector("a").textContent;
        } else {
            suggBox.querySelector("li").classList.add("active");
            inputBox.value = suggBox.querySelector("li a").textContent;
        }
    }
    else if (e.key === "ArrowUp") {
        e.preventDefault();
        const activeSuggestion = suggBox.querySelector(".active");
        if (activeSuggestion) {
            activeSuggestion.previousElementSibling.classList.add("active");
            activeSuggestion.classList.remove("active");
            inputBox.value = activeSuggestion.previousElementSibling.querySelector("a").textContent;
        } else {
            suggBox.querySelector("li:last-child").classList.add("active");
            inputBox.value = suggBox.querySelector("li:last-child a").textContent;
        }
    }
    
});

function showSuggestions(list) {
    let listData;
    if (!list.length) {
        userValue = inputBox.value;
        listData = `<li><a href="https://en.wikipedia.org/wiki/${userValue.replace(/\s+/g, '_')}" target="_blank" style="text-decoration: none; color: white">${userValue}</a></li>`;
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