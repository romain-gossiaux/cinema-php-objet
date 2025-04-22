create or replace function update_seance(int,timestamp) returns integer 
as
$$
	declare 
		retour integer;
	begin
		UPDATE seance set date_heure = $2
		WHERE id = $1;
		
		GET DIAGNOSTICS retour = row_count;
		return retour;	
	end;
	
$$
language 'plpgsql';