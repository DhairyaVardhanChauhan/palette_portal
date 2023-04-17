const chooseButton = document.querySelector('#post-choose');
const leftPart = document.querySelector('.left-part');

const input = document.getElementById("pfile");

let image = document.createElement('img');
image.width = 500; // Set default width to 300 pixels
image.height = 500; // Set default height to 300 pixels
image.style.borderRadius = '10px';

let selectedImage;

// Add a click event listener to the post button
chooseButton.addEventListener('click', function (event) {
    event.preventDefault(); // Prevent form submission

    // If there is already an image displayed, remove it
    if (leftPart.firstChild) {
        leftPart.removeChild(leftPart.firstChild);
    }

    // Create an input element of type file
    // const input = document.createElement('input');
    // input.type = 'file';

    // Add an event listener to the input element
    input.addEventListener('change', function (event) {
        // Get the selected file
        const file = event.target.files[0];

        // Create a FileReader object
        const reader = new FileReader();

        // Add an event listener to the reader object
        reader.addEventListener('load', function () {
            // Set the source of the image element to the data URL of the selected file
            image.src = reader.result;
            selectedImage = reader.result;

            // Append the image element to the left part div
            leftPart.appendChild(image);
        });

        // Read the selected file as a data URL
        reader.readAsDataURL(file);
    });

    // Click the input element to open the file dialog
    input.click();
});

const form = document.getElementById("post-form");
const pname = document.getElementById("pname");
const ptype = document.getElementById("ptype");
const pcost = document.getElementById("pcost");
const pdesc = document.getElementById("pdesc");


form.addEventListener("submit", (e) => {
    e.preventDefault();

    const post = {
        name: pname.value,
        type: ptype.value,
        cost: pcost.value,
        desc: pdesc.value,
        img: selectedImage,
        uuid: crypto.randomUUID()
    };

    const posts = JSON.parse(localStorage.getItem('posts')) || [];
    posts.push(post);

    localStorage.setItem('posts', JSON.stringify(posts));
    window.location = "/palette_portal/pages/explore.html"
});