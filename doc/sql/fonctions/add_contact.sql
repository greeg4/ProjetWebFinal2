create or replace function add_contact (text,text,text,text,text) returns integer
as
'
  declare n_sexe alias for $1;
  declare n_nom alias for $2;
  declare n_prenom alias for $3;
  declare n_comm alias for $4;
  declare n_email alias for $5;
  declare retour integer;
  declare id integer;
begin
 	insert into contact(sexe,nom,prenom,comm,email) 
	values (n_sexe,n_nom,n_prenom,n_comm,n_email);
        select into id idContact from contact where sexe=n_sexe and nom=n_nom 
        and prenom=n_prenom and comm=n_comm and email=n_email;
        if not found	then
		retour=0;
	else 
		retour=1;
	end if;
        return retour;
end;
'
language 'plpgsql';