SELECT title AS 'Title', summary AS 'Summary', prod_year
FROM film
INNER JOIN genre USING(id_genre)
WHERE name = 'erotic'
ORDER BY prod_year DESC;