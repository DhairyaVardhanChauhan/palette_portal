const url = new URL(window.location);
const searchParams = url.searchParams;

const uuid = searchParams.get("uuid");

console.log(uuid);

// check local storage for image data on page load
const posts = JSON.parse(localStorage.getItem('posts')) || [];

posts.forEach(function (post) {
    if (post.uuid == uuid) {
        console.log(post);

    // ...
    // add the image to the main element
    const main = document.getElementsByTagName('main')[0];
    const item = document.createElement('div');
    item.classList.add('item');
    item.classList.add('arr_divcont');
    main.appendChild(item);

    const imageContainer = document.createElement('div');
    imageContainer.classList.add('image-container');
    item.appendChild(imageContainer);

    const storedImage = document.createElement('img');
    storedImage.src = post.img;
    storedImage.classList.add('arr-img'); // Add class "arr-img" to the img element
    imageContainer.appendChild(storedImage);

    const contentContainer = document.createElement('div');
    contentContainer.classList.add('content-container');
    item.appendChild(contentContainer);

    for (const key in post) {   
        if (key === "img" || key === "uuid") {
            continue; // Skip appending for "img" or "uuid"
        }
        const valueElement = document.createElement('p');
        valueElement.textContent = key + ": " + post[key];
        valueElement.classList.add('arr-content'); // Add class "arr-content" to the p element
        contentContainer.appendChild(valueElement);
    }

    }
});