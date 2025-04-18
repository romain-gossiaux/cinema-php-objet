CREATE OR REPLACE FUNCTION add_seance(int, timestamp) RETURNS integer AS
$$
DECLARE
    retour integer;
BEGIN
    INSERT INTO seance(id_film, date_heure)
	VALUES ($1, $2)
	ON CONFLICT DO NOTHING;

	SELECT id INTO retour FROM seance WHERE id_film = $1 AND date_heure = $2;

	IF retour IS NULL
	THEN
		return -1;
	ELSE
		return retour;
	END IF;
END;
$$
LANGUAGE 'plpgsql';