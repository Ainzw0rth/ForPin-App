// TODO: later find a way to connect the list to the database
const tempMedias = [
    'public/images/testing_images/1.jpeg',
    'public/images/testing_images/2.jpeg',
    'public/images/testing_images/3.jpeg',
    'public/images/testing_images/4.jpeg',
    'public/images/testing_images/5.jpeg',
    'public/images/testing_images/6.jpeg',
    'public/images/testing_images/7.jpeg',
    'public/images/testing_images/8.jpeg',
    'public/images/testing_images/9.jpeg',
    'public/images/testing_images/10.jpeg',
    'public/images/testing_images/11.jpeg',
    'public/images/testing_images/12.jpg',
    'public/images/testing_images/13.png',
    'public/images/testing_images/14.jpg',
    'public/images/testing_images/15.jpg',
    'public/images/testing_images/16.jpg',
    'public/images/testing_images/17.jpg',
    'public/images/testing_images/18.jpg',
    'public/images/testing_images/19.jpg',
    'public/images/testing_images/20.jpg',
    'public/images/testing_images/21.jpg',
    'public/images/testing_images/22.gif',
    'public/images/testing_images/xavier.mp4',
    'public/images/testing_images/xavier.mp4'
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