CREATE OR REPLACE FUNCTION delete_seance(int) RETURNS integer AS
$$
BEGIN
	DELETE FROM seance WHERE id = $1;
	RETURN 1;
END;
$$
LANGUAGE 'plpgsql';