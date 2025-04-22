CREATE TABLE film (
    id SERIAL PRIMARY KEY,
    realisateur TEXT,
    titre TEXT,
    description TEXT,
    duree INT,
    date_sortie DATE,
    affiche TEXT
);

CREATE TABLE seance (
    id SERIAL PRIMARY KEY,
    id_film INT REFERENCES film(id),
    date_heure TIMESTAMP
);

CREATE TABLE reservation (
    id SERIAL PRIMARY KEY,
    nom TEXT,
    email TEXT,
    id_seance INT REFERENCES seance(id)
);

CREATE TABLE admin (
    id SERIAL PRIMARY KEY,
    login TEXT not null,
    password TEXT not null,
    nom TEXT not null
);
