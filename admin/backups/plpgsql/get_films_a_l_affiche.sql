CREATE OR REPLACE FUNCTION get_films_a_l_affiche(int) 
RETURNS SETOF vue_seances_films AS
$$
BEGIN
	RETURN QUERY
	SELECT *
	FROM vue_seances_films
	ORDER BY date_heure ASC
	LIMIT $1;
END
$$
language 'plpgsql';