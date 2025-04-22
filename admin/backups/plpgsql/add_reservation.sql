CREATE OR REPLACE FUNCTION add_reservation(text, text, int) RETURNS integer AS
$$
DECLARE
    retour integer;
BEGIN
    INSERT INTO reservation(nom, email, id_seance)
	VALUES ($1, $2, $3)
	ON CONFLICT DO NOTHING;

	SELECT id INTO retour FROM reservation WHERE nom = $1 AND email = $2 AND id_seance = $3;

	IF retour IS NULL
	THEN
		return -1;
	ELSE
		return retour;
	END IF;
END;
$$
LANGUAGE 'plpgsql';