// TODO: later find a way to connect the list to the database
const tempMedias = [
    'http://localhost:8080/public/img/testing_images/1.jpeg',
    'http://localhost:8080/public/img/testing_images/2.jpeg',
    'http://localhost:8080/public/img/testing_images/3.jpeg',
    'http://localhost:8080/public/img/testing_images/4.jpeg',
    'http://localhost:8080/public/img/testing_images/5.jpeg',
    'http://localhost:8080/public/img/testing_images/6.jpeg',
    'http://localhost:8080/public/img/testing_images/7.jpeg',
    'http://localhost:8080/public/img/testing_images/8.jpeg',
    'http://localhost:8080/public/img/testing_images/9.jpeg',
    'http://localhost:8080/public/img/testing_images/10.jpeg',
    'http://localhost:8080/public/img/testing_images/11.jpeg',
    'http://localhost:8080/public/img/testing_images/12.jpg',
    'http://localhost:8080/public/img/testing_images/13.png',
    'http://localhost:8080/public/img/testing_images/14.jpg',
    'http://localhost:8080/public/img/testing_images/15.jpg',
    'http://localhost:8080/public/img/testing_images/16.jpg',
    'http://localhost:8080/public/img/testing_images/17.jpg',
    'http://localhost:8080/public/img/testing_images/18.jpg',
    'http://localhost:8080/public/img/testing_images/19.jpg',   
    'http://localhost:8080/public/img/testing_images/20.jpg',
    'http://localhost:8080/public/img/testing_images/21.jpg',
    'http://localhost:8080/public/img/testing_images/22.gif',
    'http://localhost:8080/public/img/testing_images/xavier.mp4',
    'http://localhost:8080/public/img/testing_images/xavier.mp4'
];

// for adding each medias to the homepage
function addMedias() {
    const canvas = document.getElementById('media_canvas');
    let i = 0;

    tempMedias.forEach((mediaurl, index) => {
        const button = document.createElement('button');
        let media;
        if (mediaurl.endsWith('.jpeg') || mediaurl.endsWith('.jpg') || mediaurl.endsWith('.png') || mediaurl.endsWith('.gif')) {
            media = document.createElement('img');
            media.src = mediaurl;
            
            media.onload = () => {
                const numRows = Math.ceil(media.height / parseFloat(getComputedStyle(document.documentElement).getPropertyValue('--row_increment')));
                button.style.gridRowEnd = `span ${numRows+3}`;
            };
        } else {
            media = document.createElement('video');
            media.controls = true;
            media.src = mediaurl;
            media.onloadedmetadata = () => {
                const numRows = Math.ceil(media.clientHeight / parseFloat(getComputedStyle(document.documentElement).getPropertyValue('--row_increment')));
                button.style.gridRowEnd = `span ${numRows+3}`;
            };
        }
        
        button.appendChild(media);
        
        canvas.appendChild(button);
    })
}

addMedias();