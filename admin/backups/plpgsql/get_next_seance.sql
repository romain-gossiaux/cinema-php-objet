CREATE OR REPLACE FUNCTION get_next_seance() RETURNS vue_seances_films AS
$$
DECLARE
	retour vue_seances_films%ROWTYPE;
BEGIN
	SELECT * INTO retour
	FROM vue_seances_films
	WHERE date_heure = (
		SELECT MIN(date_heure)
		FROM seance
		WHERE date_heure > NOW()
	)
	LIMIT 1;

	RETURN retour;
END
$$
language 'plpgsql';