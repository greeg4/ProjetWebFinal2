CREATE OR REPLACE FUNCTION addClient(text,text,text,text,integer,text,text)
  RETURNS integer AS
'
    declare n_nom alias for $1;
    declare n_pr alias for $2;
    declare n_adr alias for $3;
    declare n_vi alias for $4;
    declare n_cp alias for $5;
    declare n_pa alias for $6;
    declare n_tel alias for $7;
    declare id integer;
    begin
        insert into client(nom, prenom, adresse, ville, cp, pays, numdetel) values (n_nom, n_pr, n_adr, n_vi, n_cp, n_pa, n_tel);
        select into id idClient from client where nom=n_nom and prenom=n_pr and adresse=n_a and ville=n_vi and cp=n_cp and pays=n_pa and numTel=n_tel;
	if not found then
	    id=0;
	end if;
	return id;
end;
'
LANGUAGE plpgsql 

