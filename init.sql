-- Step 1: Create the database
DROP DATABASE IF EXISTS audio;
CREATE DATABASE IF NOT EXISTS audio;
USE audio;

-- Step 2: Create the genre table
CREATE TABLE IF NOT EXISTS genre (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Step 3: Create the tracks table
CREATE TABLE IF NOT EXISTS tracks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    artist VARCHAR(255),
    album VARCHAR(255),
    release_date DATE,
    genre_id INT,
    FOREIGN KEY (genre_id) REFERENCES genre(id)
);

CREATE TABLE IF NOT EXISTS genre (
    genre_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);


-- Optional Step: Add sample data
INSERT INTO genre (name) VALUES ('Trance'), ('Progressive'), ('House'), ('Techno');

INSERT INTO tracks (title, artist, album, release_date, genre_id) VALUES 
('Emotions', 'DSigual', 'DSigual vol8', '2002-11-21', 2),
('Infinity', 'Zentral', 'Infinity EP', '2000-07-01', 1),
('In a State (dub mix)', 'Redanka', 'In a State EP', '2003-12-22', 3),
('Tuareg (Le mirage rmx)', 'Ricky Le Roy', 'Tuareg EP', '2000-11-30', 4);

-- Verify the one-to-many relationship
SELECT * FROM genre;
SELECT * FROM tracks;
