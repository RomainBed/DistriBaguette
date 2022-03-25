--Requetre SQL 

-- Page client affichage distributeur

SELECT D.place, D.localisation, D.stock, D.etat, B.nom FROM distributeur D, boulanger B WHERE B.id_boulanger = D.id_distributeur;


-- Index page Admin

SELECT D.place, D.localisation, D.stock, D.etat, B.nom, B.adresse_mail, B.telephone FROM distributeur D, boulanger B WHERE B.id_boulanger = D.id_distributeur;

--Authentification Admin

mysql -u 'admin' -p 'root' -h '172.20.233.109' -D 'distribaguette'

--Index paramétrage Admin

INSERT INTO boulanger(`nom`, `prenom`, `telephone`, `adresse_mail`) VALUES
('variables_nom', 'variables_prenom', 'variables_tel', 'variables_mail');

INSERT INTO distributeur(`nom`, `localisation`, `stock`, `etat`) VALUES
('variables_nom', 'variables_localisation', 'variables_stock', 'variables_etat');

--Index page archive

SELECT nom, stock FROM distributeur;


