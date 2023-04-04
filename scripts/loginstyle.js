const background = document.getElementById('background');
const dots = document.querySelector('.dots');
const size = 50;
let rows = Math.floor(window.innerHeight / size);
let columns = Math.floor(window.innerWidth / size);
let timer = 7000;

let colors = [
    '#FFFAFA',
    '#FF0800',
    '#FF8000',
    '#FFD700',
    '#C0FF00',
    '#0000FF',
    '#D473D4',
    '#1B1B1B'
]
colors = colors.sort((a, b) => 0.5 - Math.random());

const gradients = [
    ['#ff930f', '#fff95b'],
    ['#595cff', '#c6f8ff'],
    ['#696eff', '#f8acff'],
    ['#f3f520', '#59d102'],
    ['#8711c1', '#2472fc']
]

let count = 0;
function hexToRGB(hexVal) {
    let hex = hexVal.replace('#', ''); // Removes the # from the hex value

    // Converting HEX to RGB
    let red = parseInt(hex.substring(0, 2), 16);
    let green = parseInt(hex.substring(2, 4), 16);
    let blue = parseInt(hex.substring(4, 6), 16);

    red = 255 - red;
    green = 255 - green;
    blue = 255 - blue;

    // Updating text colour
    document.body.style.color = `rgb(${red}, ${green}, ${blue})`;


}
const handleOnClick = index => {
    count += 1;
    const newColour = colors[count % (colors.length)];
    anime({
        targets: '.tile',
        backgroundColor: newColour,
        delay: anime.stagger(75, {
            grid: [columns, rows],
            from: index
        })
    })
    hexToRGB(newColour);
    clearInterval(click);
    click = setInterval(randomClick, timer);
}

function createTile(index) {
    const tile = document.createElement('div');
    tile.classList.add('tile');
    tile.style.backgroundColor = colors[count % colors.length];
    tile.onclick = e => handleOnClick(index);
    return tile;
}

function createTiles(number) {
    Array.from(Array(number)).map((tile, index) => {
        background.appendChild(createTile(index));
    })
}

function createGrid() {
    background.innerHTML = "";

    rows = Math.floor(window.innerHeight / size);
    columns = Math.floor(window.innerWidth / size);

    background.style.setProperty('--rows', rows);
    background.style.setProperty('--columns', columns);

    createTiles(rows * columns);
}

const randomClick = () => {
    handleOnClick(Math.floor(Math.random() * rows * columns) + 1);
    // change bubble color after every n random clicks
    if (count % colors.length == 0)
        setBubbleColor(gradients);
}

const setBubbleColor = gradients => {
    let gradient = gradients[Math.floor(Math.random() * gradients.length)]
    dots.style.setProperty('--color1', gradient[0]);
    dots.style.setProperty('--color2', gradient[1]);
}

window.onload = createGrid;
window.onresize = createGrid;
let click = setInterval(randomClick, timer);

setBubbleColor(gradients);