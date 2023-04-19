-- Afficher les sessions de formation à venir qui se chevauchent pas avec une session donnée
SELECT * FROM session WHERE date_début> = CURDATE ()
AND (date_début>= 01/01/2023 OR date_fin<= 05/05/2023)
-- Afficher les sessions de formation à venir avec des places encore disponibles
SELECT t1.* FROM apprenant t1 INNER JOIN apprenant_session t2 on t1.id_app = t2.id_app INNER JOIN session t3 ON t3.id_session = t2.id_session WHERE t3.id_session=2;
-- Afficher le nombre des inscrits par session de formation
SELECT * FROM formation F INNER JOIN session S ON S.id_formation = F.id_formation
-- Afficher l'historique des sessions de formation d'un apprenant donné
SELECT * FROM formation F LEFT JOIN session S ON S.id_formation = F.id_formation
-- Afficher la liste des sessions qui sont affectées à un formateur donné, triées par date de début
SELECT * FROM session S LEFT JOIN aprenant_session A ON S.id_session = A.id_session;
-- Afficher la liste des apprenants d'une session donnée d'un formateur donné
SELECT S.id_session,COUNT(S.id_session),S.place_max FROM session S LEFT JOIN aprenant_session A ON s.id_session = A.id_session GROUP BY S.id_session HAVING COUNT(S.id_session)<S.place_max;
-- Afficher l'historique des sessions de formation d'un formateur donné
SELECT * FROM session S WHERE S.id_formateur = S.id_formateur;
-- Afficher les formateurs qui sont disponibles entre 2 dates
SELECT * FROM session WHERE id_formateur = 2 ORDER BY date_début ASC;
-- Afficher toutes les sessions d'une formation donnée
SELECT COUNT(*) FROM aprenant A INNER JOIN aprenant_session ap on A.id_aprenant=A.id_aprenant WHERE id_session =4;
-- Afficher le nombre total des sessions par cétegorie de formation
SELECT COUNT(*) FROM session S INNER JOIN formateur F ON S.id_formateur = F.id_formateur WHERE S.date_début BETWEEN date_début AND date_fin OR S.date_fin BETWEEN date_début AND date_fin OR date_début BETWEEN S.date_début AND S.date_fin OR date_fin BETWEEN S.date_début AND S.date_fin;
-- Afficher le nombre total des inscrits par catégorie formation
SELECT f.catégorie , COUNT(f.catégorie) AS Nombre_session FROM formation f INNER JOIN session S ON f.id_formation=S.id_formation GROUP BY f.catégorie;

 SELECT A.nom, A.prenom, a.email FROM aprenant a INNER JOIN aprenant_session ap ON A.id_aprenant = ap.id_aprenant INNER JOIN session s ON s.id_session = ap.id_session WHERE s.id_session = s.id_session AND s.id_formateur =s.id_formateur;
