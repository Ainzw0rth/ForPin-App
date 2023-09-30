// TODO: later find a way to connect the list to the database
const tempImages = [
    'http://localhost:8080/src/public/images/testing_images/1.jpeg',
    'http://localhost:8080/src/public/images/testing_images/2.jpeg',
    'http://localhost:8080/src/public/images/testing_images/3.jpeg',
    'http://localhost:8080/src/public/images/testing_images/4.jpeg',
    'http://localhost:8080/src/public/images/testing_images/5.jpeg',
    'http://localhost:8080/src/public/images/testing_images/6.jpeg',
    'http://localhost:8080/src/public/images/testing_images/7.jpeg',
    'http://localhost:8080/src/public/images/testing_images/8.jpeg',
    'http://localhost:8080/src/public/images/testing_images/9.jpeg',
    'http://localhost:8080/src/public/images/testing_images/10.jpeg',
    'http://localhost:8080/src/public/images/testing_images/11.jpeg',
    'http://localhost:8080/src/public/images/testing_images/12.jpg',
    'http://localhost:8080/src/public/images/testing_images/13.png',
    'http://localhost:8080/src/public/images/testing_images/14.jpg',
    'http://localhost:8080/src/public/images/testing_images/15.jpg',
    'http://localhost:8080/src/public/images/testing_images/16.jpg',
    'http://localhost:8080/src/public/images/testing_images/17.jpg',
    'http://localhost:8080/src/public/images/testing_images/18.jpg',
    'http://localhost:8080/src/public/images/testing_images/19.jpg',
    'http://localhost:8080/src/public/images/testing_images/20.jpg',
    'http://localhost:8080/src/public/images/testing_images/21.jpg',
    'http://localhost:8080/src/public/images/testing_images/11.jpeg'
];

// for adding each images to the homepage
function addImages() {
    const canvas = document.getElementById('media_canvas');
    let i = 0;

    tempImages.forEach((imageurl, index) => {
        const button = document.createElement('button');
        const image = document.createElement('img');
        
        image.onload = () => {
            const numRows = Math.ceil(image.height / parseFloat(getComputedStyle(document.documentElement).getPropertyValue('--row_increment')));
            button.style.gridRowEnd = `span ${numRows+3}`;
        };

        image.src = imageurl;
        button.appendChild(image);
        
        canvas.appendChild(button);
    })
}

addImages();