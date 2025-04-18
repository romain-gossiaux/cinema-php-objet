CREATE OR REPLACE VIEW vue_seances_films AS
SELECT
    s.id AS id_seance,
    s.date_heure,
    f.id AS id_film,
    f.titre,
    f.duree,
    f.affiche
FROM
    seance s
        JOIN
    film f ON s.id_film = f.id;