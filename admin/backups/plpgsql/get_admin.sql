CREATE OR REPLACE FUNCTION get_admin(text,text) RETURNS TEXT AS
'
DECLARE
    admin_name TEXT;
BEGIN
    -- Récupérer le nom de ladministrateur
    SELECT nom INTO admin_name FROM admin WHERE login = $1
    and password = $2;

    -- Vérifier si un administrateur a été trouvé
    IF admin_name IS NULL THEN
        RETURN null;
    END IF;

    RETURN admin_name;
END;
'
LANGUAGE 'plpgsql';