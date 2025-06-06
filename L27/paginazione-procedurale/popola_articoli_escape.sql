-- Crea il database (opzionale)
CREATE DATABASE IF NOT EXISTS esempio_db;
USE esempio_db;

-- Crea la tabella
CREATE TABLE IF NOT EXISTS articoli (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titolo VARCHAR(255),
    contenuto TEXT
);

-- Inserisci 100 articoli di esempio
INSERT INTO articoli (titolo, contenuto) VALUES
('Titolo Articolo 1', 'Questo è il contenuto dell''articolo 1.'),
('Titolo Articolo 2', 'Questo è il contenuto dell''articolo 2.'),
('Titolo Articolo 3', 'Questo è il contenuto dell''articolo 3.'),
('Titolo Articolo 4', 'Questo è il contenuto dell''articolo 4.'),
('Titolo Articolo 5', 'Questo è il contenuto dell''articolo 5.'),
('Titolo Articolo 6', 'Questo è il contenuto dell''articolo 6.'),
('Titolo Articolo 7', 'Questo è il contenuto dell''articolo 7.'),
('Titolo Articolo 8', 'Questo è il contenuto dell''articolo 8.'),
('Titolo Articolo 9', 'Questo è il contenuto dell''articolo 9.'),
('Titolo Articolo 10', 'Questo è il contenuto dell''articolo 10.'),
('Titolo Articolo 11', 'Questo è il contenuto dell''articolo 11.'),
('Titolo Articolo 12', 'Questo è il contenuto dell''articolo 12.'),
('Titolo Articolo 13', 'Questo è il contenuto dell''articolo 13.'),
('Titolo Articolo 14', 'Questo è il contenuto dell''articolo 14.'),
('Titolo Articolo 15', 'Questo è il contenuto dell''articolo 15.'),
('Titolo Articolo 16', 'Questo è il contenuto dell''articolo 16.'),
('Titolo Articolo 17', 'Questo è il contenuto dell''articolo 17.'),
('Titolo Articolo 18', 'Questo è il contenuto dell''articolo 18.'),
('Titolo Articolo 19', 'Questo è il contenuto dell''articolo 19.'),
('Titolo Articolo 20', 'Questo è il contenuto dell''articolo 20.'),
('Titolo Articolo 21', 'Questo è il contenuto dell''articolo 21.'),
('Titolo Articolo 22', 'Questo è il contenuto dell''articolo 22.'),
('Titolo Articolo 23', 'Questo è il contenuto dell''articolo 23.'),
('Titolo Articolo 24', 'Questo è il contenuto dell''articolo 24.'),
('Titolo Articolo 25', 'Questo è il contenuto dell''articolo 25.'),
('Titolo Articolo 26', 'Questo è il contenuto dell''articolo 26.'),
('Titolo Articolo 27', 'Questo è il contenuto dell''articolo 27.'),
('Titolo Articolo 28', 'Questo è il contenuto dell''articolo 28.'),
('Titolo Articolo 29', 'Questo è il contenuto dell''articolo 29.'),
('Titolo Articolo 30', 'Questo è il contenuto dell''articolo 30.'),
('Titolo Articolo 31', 'Questo è il contenuto dell''articolo 31.'),
('Titolo Articolo 32', 'Questo è il contenuto dell''articolo 32.'),
('Titolo Articolo 33', 'Questo è il contenuto dell''articolo 33.'),
('Titolo Articolo 34', 'Questo è il contenuto dell''articolo 34.'),
('Titolo Articolo 35', 'Questo è il contenuto dell''articolo 35.'),
('Titolo Articolo 36', 'Questo è il contenuto dell''articolo 36.'),
('Titolo Articolo 37', 'Questo è il contenuto dell''articolo 37.'),
('Titolo Articolo 38', 'Questo è il contenuto dell''articolo 38.'),
('Titolo Articolo 39', 'Questo è il contenuto dell''articolo 39.'),
('Titolo Articolo 40', 'Questo è il contenuto dell''articolo 40.'),
('Titolo Articolo 41', 'Questo è il contenuto dell''articolo 41.'),
('Titolo Articolo 42', 'Questo è il contenuto dell''articolo 42.'),
('Titolo Articolo 43', 'Questo è il contenuto dell''articolo 43.'),
('Titolo Articolo 44', 'Questo è il contenuto dell''articolo 44.'),
('Titolo Articolo 45', 'Questo è il contenuto dell''articolo 45.'),
('Titolo Articolo 46', 'Questo è il contenuto dell''articolo 46.'),
('Titolo Articolo 47', 'Questo è il contenuto dell''articolo 47.'),
('Titolo Articolo 48', 'Questo è il contenuto dell''articolo 48.'),
('Titolo Articolo 49', 'Questo è il contenuto dell''articolo 49.'),
('Titolo Articolo 50', 'Questo è il contenuto dell''articolo 50.'),
('Titolo Articolo 51', 'Questo è il contenuto dell''articolo 51.'),
('Titolo Articolo 52', 'Questo è il contenuto dell''articolo 52.'),
('Titolo Articolo 53', 'Questo è il contenuto dell''articolo 53.'),
('Titolo Articolo 54', 'Questo è il contenuto dell''articolo 54.'),
('Titolo Articolo 55', 'Questo è il contenuto dell''articolo 55.'),
('Titolo Articolo 56', 'Questo è il contenuto dell''articolo 56.'),
('Titolo Articolo 57', 'Questo è il contenuto dell''articolo 57.'),
('Titolo Articolo 58', 'Questo è il contenuto dell''articolo 58.'),
('Titolo Articolo 59', 'Questo è il contenuto dell''articolo 59.'),
('Titolo Articolo 60', 'Questo è il contenuto dell''articolo 60.'),
('Titolo Articolo 61', 'Questo è il contenuto dell''articolo 61.'),
('Titolo Articolo 62', 'Questo è il contenuto dell''articolo 62.'),
('Titolo Articolo 63', 'Questo è il contenuto dell''articolo 63.'),
('Titolo Articolo 64', 'Questo è il contenuto dell''articolo 64.'),
('Titolo Articolo 65', 'Questo è il contenuto dell''articolo 65.'),
('Titolo Articolo 66', 'Questo è il contenuto dell''articolo 66.'),
('Titolo Articolo 67', 'Questo è il contenuto dell''articolo 67.'),
('Titolo Articolo 68', 'Questo è il contenuto dell''articolo 68.'),
('Titolo Articolo 69', 'Questo è il contenuto dell''articolo 69.'),
('Titolo Articolo 70', 'Questo è il contenuto dell''articolo 70.'),
('Titolo Articolo 71', 'Questo è il contenuto dell''articolo 71.'),
('Titolo Articolo 72', 'Questo è il contenuto dell''articolo 72.'),
('Titolo Articolo 73', 'Questo è il contenuto dell''articolo 73.'),
('Titolo Articolo 74', 'Questo è il contenuto dell''articolo 74.'),
('Titolo Articolo 75', 'Questo è il contenuto dell''articolo 75.'),
('Titolo Articolo 76', 'Questo è il contenuto dell''articolo 76.'),
('Titolo Articolo 77', 'Questo è il contenuto dell''articolo 77.'),
('Titolo Articolo 78', 'Questo è il contenuto dell''articolo 78.'),
('Titolo Articolo 79', 'Questo è il contenuto dell''articolo 79.'),
('Titolo Articolo 80', 'Questo è il contenuto dell''articolo 80.'),
('Titolo Articolo 81', 'Questo è il contenuto dell''articolo 81.'),
('Titolo Articolo 82', 'Questo è il contenuto dell''articolo 82.'),
('Titolo Articolo 83', 'Questo è il contenuto dell''articolo 83.'),
('Titolo Articolo 84', 'Questo è il contenuto dell''articolo 84.'),
('Titolo Articolo 85', 'Questo è il contenuto dell''articolo 85.'),
('Titolo Articolo 86', 'Questo è il contenuto dell''articolo 86.'),
('Titolo Articolo 87', 'Questo è il contenuto dell''articolo 87.'),
('Titolo Articolo 88', 'Questo è il contenuto dell''articolo 88.'),
('Titolo Articolo 89', 'Questo è il contenuto dell''articolo 89.'),
('Titolo Articolo 90', 'Questo è il contenuto dell''articolo 90.'),
('Titolo Articolo 91', 'Questo è il contenuto dell''articolo 91.'),
('Titolo Articolo 92', 'Questo è il contenuto dell''articolo 92.'),
('Titolo Articolo 93', 'Questo è il contenuto dell''articolo 93.'),
('Titolo Articolo 94', 'Questo è il contenuto dell''articolo 94.'),
('Titolo Articolo 95', 'Questo è il contenuto dell''articolo 95.'),
('Titolo Articolo 96', 'Questo è il contenuto dell''articolo 96.'),
('Titolo Articolo 97', 'Questo è il contenuto dell''articolo 97.'),
('Titolo Articolo 98', 'Questo è il contenuto dell''articolo 98.'),
('Titolo Articolo 99', 'Questo è il contenuto dell''articolo 99.'),
('Titolo Articolo 100', 'Questo è il contenuto dell''articolo 100.');