create or replace function add_real (text,text) returns integer
as
'
  declare n_nom alias for $1;
  declare n_pays alias for $2;
  declare retour integer;
  declare id integer;
begin
 	insert into realisateur(nomReal,paysReal) 
	values (f_nom,f_pays);
        select into id idReal from realisateur where nomReal=n_nom and paysReal=n_pays;

        if not found	then
		retour=0;
	else 
		retour=1;
	end if;
        return retour;
end;
'
language 'plpgsql';
