create or replace function addDVD(text, real, integer, integer, integer)
returns integer as
'
    declare n_titre alias for $1;
    declare n_prix alias for $2;
    declare n_genre alias for $3;
    declare n_real alias for $4;
    declare n_supp alias for $5;
    declare retour integer;
    declare id integer;
BEGIN
    insert into dvd(titre, prix, idGenre, idReal, idSupp) values (n_titre, n_prix, n_genre, n_real, n_supp);
    select into id idDVD from dvd where titre=n_titre and prix=n_prix and idGenre=n_genre and idReal=n_real and idSupp=n_supp;
    if not found then
	retour=0;
    else
	retour=1;
    end if;
    return retour;
end;
'
  Language plpgsql
