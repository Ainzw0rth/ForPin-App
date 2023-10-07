CREATE table IF NOT EXISTS post (
post_id SERIAL PRIMARY KEY NOT NULL,
caption VARCHAR(100),
descriptions VARCHAR(500),
post_time DATE NOT NULL,
likes INT NOT NULL DEFAULT 0,
genre VARCHAR(50) 
);

CREATE table IF NOT EXISTS users (
    user_id SERIAL PRIMARY KEY NOT NULL,
    email VARCHAR(100) NOT NULL,
    fullname VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL, 
    is_admin BOOLEAN NOT NULL,
    profile_path VARCHAR(300) NOT NULL DEFAULT 'http://localhost:8080/public/images/testing_images/1.jpeg'
);

CREATE table IF NOT EXISTS videos (
    vid_id SERIAL PRIMARY KEY NOT NULL,
    post_id INT NOT NULL REFERENCES post(post_id) ON DELETE CASCADE,
    vid_path VARCHAR(100) NOT NULL
);

CREATE table IF NOT EXISTS images (
    img_id SERIAL PRIMARY KEY NOT NULL,
    post_id INT NOT NULL REFERENCES post(post_id) ON DELETE CASCADE,
    img_path VARCHAR(100) NOT NULL
);

CREATE table IF NOT EXISTS user_post (
    user_id INT REFERENCES users(user_id) ON DELETE CASCADE,
    post_id INT REFERENCES post(post_id) ON DELETE CASCADE
);

INSERT INTO users (email, fullname, username, password, is_admin) VALUES
('user1@example.com', 'User One', 'userone', '$2y$10$eFPcsPjJ80McAa3AdJMW9uTYtt364DvZfaUbG3hWZuu7ddKvx0Aey', false),
('user2@example.com', 'User Two', 'usertwo', '$2y$10$yTYdd.CyHSyObYrDCDYKD.jHpXlyGX.qIYD7TqIEOi94f2cO6XWyy', false),
('user3@example.com', 'User Three', 'userthree', '$2y$10$H./copxlAFyHDQ27HmF/DuSKyVqU6kMumQlTIlaLNQXxbhc1asJIy', false),
('admin@example.com', 'Admin User', 'adminuser', '$2y$10$GXEDVwao5y.YlTXfx3FHMe0txYVAjh20z2tNIi.eMWKhB2OcWzuxq', true),
('test@example.com', 'Test User', 'testuser', '$2y$10$jKC6RX7.Vt2.EM20X7NNa.Q1vXVAb7DnZHKhbiro.54YdXdX2T3e.', false);

INSERT INTO post (caption, descriptions, post_time, likes, genre) VALUES
('Post 1 Caption', 'Description for Post 1', '2023-10-01', 10, 'happy, horror, meme'),
('Post 2 Caption', 'Description for Post 2', '2023-10-02', 15, 'horror'),
('Post 3 Caption', 'Description for Post 3', '2023-10-03', 5, 'happy'),
('Post 4 Caption', 'Description for Post 4', '2023-10-04', 20, 'meme'),
('Post 5 Caption', 'Description for Post 5', '2023-10-05', 8, 'horror'),
('Post 6 Caption', 'Description for Post 6', '2023-10-06', 12, 'happy'),
('Post 7 Caption', 'Description for Post 7', '2023-10-07', 4, 'meme'),
('Post 8 Caption', 'Description for Post 8', '2023-10-08', 25, 'horror'),
('Post 9 Caption', 'Description for Post 9', '2023-10-09', 14, 'happy'),
('Post 10 Caption', 'Description for Post 10', '2023-10-10', 30, 'meme'),
('Post 11 Caption', 'Description for Post 11', '2023-10-11', 7, 'horror'),
('Post 12 Caption', 'Description for Post 12', '2023-10-12', 18, 'happy'),
('Post 13 Caption', 'Description for Post 13', '2023-10-13', 9, 'meme'),
('Post 14 Caption', 'Description for Post 14', '2023-10-14', 22, 'horror'),
('Post 15 Caption', 'Description for Post 15', '2023-10-15', 6, 'happy'),
('Post 16 Caption', 'Description for Post 16', '2023-10-16', 11, 'meme'),
('Post 17 Caption', 'Description for Post 17', '2023-10-17', 13, 'horror'),
('Post 18 Caption', 'Description for Post 18', '2023-10-18', 28, 'happy'),
('Post 19 Caption', 'Description for Post 19', '2023-10-19', 7, 'meme'),
('Post 20 Caption', 'Description for Post 20', '2023-10-20', 31, 'horror'),
('Post 21 Caption', 'Description for Post 21', '2023-10-21', 10, 'happy'),
('Post 22 Caption', 'Description for Post 22', '2023-10-22', 16, 'meme'),
('Post 23 Caption', 'Description for Post 23', '2023-10-23', 15, 'horror'),
('Post 24 Caption', 'Description for Post 24', '2023-10-24', 19, 'happy');

INSERT INTO user_post (user_id, post_id) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(4, 16),
(4, 17),
(4, 18),
(4, 19),
(4, 20),
(5, 21),
(5, 22),
(5, 23),
(5, 24);

INSERT INTO images (post_id, img_path) VALUES
(1, 'http://localhost:8080/public/images/testing_images/1.jpeg'),
(1, 'http://localhost:8080/public/images/testing_images/2.jpeg'),
(1, 'http://localhost:8080/public/images/testing_images/3.jpeg'),
(1, 'http://localhost:8080/public/images/testing_images/4.jpeg'),
(1, 'http://localhost:8080/public/images/testing_images/5.jpeg'),
(2, 'http://localhost:8080/public/images/testing_images/2.jpeg'),
(3, 'http://localhost:8080/public/images/testing_images/3.jpeg'),
(4, 'http://localhost:8080/public/images/testing_images/4.jpeg'),
(5, 'http://localhost:8080/public/images/testing_images/5.jpeg'),
(6, 'http://localhost:8080/public/images/testing_images/6.jpeg'),
(7, 'http://localhost:8080/public/images/testing_images/7.jpeg'),
(8, 'http://localhost:8080/public/images/testing_images/8.jpeg'),
(9, 'http://localhost:8080/public/images/testing_images/9.jpeg'),
(10, 'http://localhost:8080/public/images/testing_images/10.jpeg'),
(11, 'http://localhost:8080/public/images/testing_images/11.jpeg'),
(12, 'http://localhost:8080/public/images/testing_images/12.jpg'),
(13, 'http://localhost:8080/public/images/testing_images/13.png'),
(14, 'http://localhost:8080/public/images/testing_images/14.jpg'),
(15, 'http://localhost:8080/public/images/testing_images/15.jpg'),
(16, 'http://localhost:8080/public/images/testing_images/16.jpg'),
(17, 'http://localhost:8080/public/images/testing_images/17.jpg'),
(18, 'http://localhost:8080/public/images/testing_images/18.jpg'),
(19, 'http://localhost:8080/public/images/testing_images/19.jpg'),
(20, 'http://localhost:8080/public/images/testing_images/20.jpg'),
(21, 'http://localhost:8080/public/images/testing_images/21.jpg'),
(22, 'http://localhost:8080/public/images/testing_images/22.gif');

INSERT INTO videos (post_id, vid_path) VALUES
(1, 'http://localhost:8080/public/images/testing_images/xavier.mp4'),
(23, 'http://localhost:8080/public/images/testing_images/xavier.mp4'),
(24, 'http://localhost:8080/public/images/testing_images/xavier.mp4');