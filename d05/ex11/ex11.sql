SELECT UPPER(last_name) AS 'NAME', first_name, price
FROM user_card
INNER JOIN member ON id_user_card = id_user
INNER JOIN subscription USING(id_sub)
WHERE price > 42
ORDER BY last_name ASC, first_name ASC;