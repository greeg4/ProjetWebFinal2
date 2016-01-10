
create or replace function addAchat(integer, integer)
RETURNS integer as
'
    declare n_client alias for $1;
    declare n_dvd alias for $2;
    declare id integer;
    declare idc integer;
    declare retour integer;
    begin
	select into idc idClient from client where idClient=n_client;
	if not found then
	    retour=2;
	else
	    insert into achat(idClient, idDVD, dateAchat) values (n_client, n_dvd, current_date);
	    select into id idAchat from achat where idClient=n_client and
						  idDVD=n_dvd and
						  dateAchat=current_date;
	    if not found then
		retour=0;
	    else
	        retour=1;
	    end if;
    end if;
    return retour;
end;
'
language plpgsql;