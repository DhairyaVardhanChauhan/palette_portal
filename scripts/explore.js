let isBlack = false;

function toggleBackgroundColor() {
  const color = isBlack ? "white" : "black";
  document.documentElement.style.backgroundColor = color;
  document.body.style.backgroundColor = color; // added line to change body background color
  isBlack = !isBlack;
}

const modeButton = document.getElementById("mode");
modeButton.addEventListener("click", function () {
  if (modeButton.textContent === "Dark Mode") {
    modeButton.textContent = "Light Mode";
  } else {
    modeButton.textContent = "Dark Mode";
  }
})


// select the post button element
const postButton = document.querySelector('#post-button');

// add a click event listener to the post button
postButton.addEventListener('click', function () {
  // create an input element of type file
  const input = document.createElement('input');
  input.type = 'file';

  // add an event listener to the input element
  input.addEventListener('change', function (event) {
    // get the selected file
    const file = event.target.files[0];

    // create a FileReader object
    const reader = new FileReader();

    // add an event listener to the reader object
    reader.addEventListener('load', function () {
      // create an image element
      const image = document.createElement('img');

      // set the source of the image element to the data URL of the selected file
      image.src = reader.result;

      // calculate the new page height
      const newHeight = Math.ceil(image.height * 1.2);

      // set the height of the body element to the new height
      document.body.style.height = `${newHeight}px`;

      // create a div element with the item class
      const item = document.createElement('div');
      item.classList.add('item');

      // create an img element with the resized image and the raised-image class
      const resizedImage = document.createElement('img');
      resizedImage.src = reader.result;
      resizedImage.classList.add('raised-image');

      // append the resized image element to the item div
      item.appendChild(resizedImage);

      const main = document.getElementsByTagName('main')[0]

      // append the item div to the main element
      main.appendChild(item);

      // store the image data in local storage
      const images = JSON.parse(localStorage.getItem('images')) || [];
      images.push({ data: reader.result });
      localStorage.setItem('images', JSON.stringify(images));
    });

    // read the selected file as a data URL
    reader.readAsDataURL(file);
  });

  // click the input element to open the file dialog  
  input.click();
});

// check local storage for image data on page load
const images = JSON.parse(localStorage.getItem('images')) || [];

images.forEach(function (imageData) {
  // create an image element with the stored data
  const storedImage = document.createElement('img');
  storedImage.src = imageData.data;

  // add the image to the main element
  const main = document.getElementsByTagName('main')[0];
  const item = document.createElement('div');
  item.classList.add('item');
  item.appendChild(storedImage);
  main.appendChild(item);
});

// Remove the images data from localStorage
// to remove the uploaded images uncomment the below function and reload
// localStorage.removeItem('images');

