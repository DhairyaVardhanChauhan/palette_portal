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

// check local storage for image data on page load
const posts = JSON.parse(localStorage.getItem('posts')) || [];

posts.forEach(function (post) {
  // create an image element with the stored data
  const imgContainer = document.createElement("a");
  imgContainer.href = `/palette_portal/pages/shop.html?uuid=${post.uuid}`;

  const storedImage = document.createElement('img');
  storedImage.src = post.img;
  const postId = post.uuid;
  console.log(postId);

  // add the image to the main element
  const main = document.getElementsByTagName('main')[0];
  const item = document.createElement('div');
  item.classList.add('item');
  imgContainer.append(storedImage);
  item.appendChild(imgContainer);
  main.appendChild(item);
});

// Remove the images data from localStorage
// to remove the uploaded images uncomment the below function and reload
// localStorage.removeItem('img');
// or use  inspect elements ->application->local storage
