-- SELECT veut dire récuperer donc on récupere addressLine1, addressLine2, city, country, state dans ma table customers
SELECT addressLine1, addressLine2, city, country, state
FROM offices
-- SELECT veut dire récuperer donc on récupere toutes les infos = dans ma table customers
SELECT * FROM customers
-- on recupere une info quand cet info est égale a planes WHERE est une condition, la plane est une string c'est pour ca que c'est en entre cote attention pas d'espace dans l'entre cote
SELECT productCode, productName FROM products WHERE productLine = 'Planes'
-- ORDER BY pour mettre un ordre dans le listing c'est a dire descendant ou acendant puis DESC veut dire descendant on verra pas souvent ASC car il le fait par défaut
SELECT *
FROM products
WHERE productLine = 'Planes'
ORDER BY productVendor DESC, quantityInStock
-- OR
SELECT productCode, productName
FROM products
WHERE productLine = 'Planes' OR productLine = 'Motorcycles' OR productLine = 'Classic Cars'
-- IN pour se simplifié la vie quand il y a plusieurs
SELECT productCode, productName, productScale, quantityInStock
FROM products
WHERE productLine IN ('Planes', 'Motorcycles', 'Classic Cars')
-- on peut mettre des outils de comparaisons
SELECT productName, productVendor, MSRP
FROM products
WHERE MSRP >= 132
ORDER BY productName
-- on peut mettre un delta (BETWEEN) entre deux valeurs
SELECT productCode, productName, buyPrice
FROM products
WHERE buyPrice BETWEEN 60 AND 90
ORDER BY buyPrice
-- la on fait une différence entre les deux produits, AS margin c'est pour ajouter une variable pour l'utilier dans le php et on utilisera la clé margin donc
SELECT productName, productVendor, quantityInStock, (MSRP - buyPrice) AS margin
FROM products
WHERE productLine = 'Motorcycles'
-- la on fait une différence entre les deux dates
SELECT orderNumber, orderDate, shippedDate, (shippedDate - orderDate) AS processTime, status
FROM orders
WHERE status = 'In Process' OR (status = 'Shipped' AND (shippedDate - orderDate) > 10)
ORDER BY processTime DESC, orderDate
-- dans l'exemple suivant c'est compris entre 1960 et 1969
-- le pourcentage dans le LIKE '196%' est le caratere si on veut 2 caratères on met %% et ainsi de suite
SELECT productName, (quantityInStock * MSRP) AS stockValue
FROM products
WHERE productName LIKE '196%'
-- pour calculer la moyenne
SELECT productVendor, AVG(MSRP) AS averagePrice
FROM products
GROUP BY productVendor
ORDER BY averagePrice DESC
-- pour compter (equivalant comme le php avec count($var)
SELECT productLine, COUNT(productCode)
FROM products
GROUP BY productLine
-- SUM pour faire la somme
SELECT productLine, SUM(quantityInStock) AS totalStock, SUM(quantityInStock * MSRP) AS totalStockValue
FROM products
WHERE MSRP > 100
GROUP BY productLine
ORDER BY totalStockValue
-- pour récuperer le chiffre max
SELECT productVendor, MAX(quantityInStock) AS maxInStock
FROM products
GROUP BY productVendor
ORDER BY productVendor
-- pour récuperer le chiffre min
SELECT MIN(buyPrice) AS cheapestPricePlane
FROM products
WHERE productLine = 'Planes'
-- HAVING est comme WHERE
SELECT customerNumber, SUM(amount) AS totalCredit
FROM payments
WHERE paymentDate BETWEEN '2004-01-01' AND '2004-12-31'
GROUP BY customerNumber
HAVING totalCredit > 20000
ORDER BY totalCredit DESC
-- pour joindre deux colonnes
SELECT lastName, firstName, jobTitle, addressLine1, addressLine2, city
FROM employees
INNER JOIN offices ON offices.officeCode = employees.officeCode

/* La liste des clients français ou américains (nom du client, nom, prénom du contact et pays) et de leur commercial dédié (nom et prénom) triés par nom et prénom du contact */

SELECT contactLastName, contactFirstName, country
FROM customers
WHERE country = 'France' OR country = 'USA'
ORDER BY contactLastName, contactFirstName

-- correction thib
SELECT customerName, contactLastName, contactFirstName, country, lastName, firstName
FROM customers
INNER JOIN employees ON employees.employeeNumber = customers.salesRepEmployeeNumber
WHERE country IN ('France', 'USA')
ORDER BY contactLastName, contactFirstName

/* La liste des lignes de commande (numéro de commande, code, nom et ligne de produit) et la remise appliquée aux voitures ou motos commandées triées par numéro de commande puis par remise décroissante */

SELECT orderNumber, orderdetails.productCode, productName, produitLine, MSRP > 100,
FROM products
INNER JOIN orderdetails ON products.productCode = orderdetails.productCode
WHERE produitLine IN ('Motorcycles', 'Classic Cars', 'Vintage Cars')
ORDER BY product DESC

-- correction thib
SELECT orderNumber, orderdetails.productCode, productName, productLine, (MSRP - priceEach) AS discount
FROM orderdetails
INNER JOIN products ON products.productCode = orderdetails.productCode
WHERE productLine IN ('Classic Cars', 'Vintage Cars', 'Motorcycles')
ORDER BY orderNumber, discount DESC

/* RESULTAT ==> 2026 lignes / 34 */


/* Le total des paiements effectués de chaque client (numéro, nom et pays) américain, allemand ou français de plus de 50000$ trié par pays puis par total des paiements décroissant */

SELECT payments.customerNumber, customerName, country
FROM
INNER JOIN payments ON customers.contactLastName =
ORDER BY

-- correction thib
SELECT customers.customerNumber, customerName, country, SUM(amount) AS totalPayment
FROM customers
INNER JOIN payments ON payments.customerNumber = customers.customerNumber
WHERE country IN ('France', 'Germany', 'USA')
GROUP BY customers.customerNumber, customerName, country
HAVING totalPayment > 50000
ORDER BY country, totalPayment DESC



/* RESULTAT ==> 38 lignes / 146 / 130305.35 */

/* Le montant total de chaque commande (numéro et date) des clients New-Yorkais (nom) trié par nom du client puis par date de commande */
SELECT customerName, orders.orderNumber, orderDate, SUM(quantityOrdered * priceEach) AS totalAmount
FROM customers
INNER JOIN orders ON orders.customerNumber = customers.customerNumber
INNER JOIN orderdetails ON orders.orderNumber = orderdetails.orderNumber
WHERE city = 'NYC'
GROUP BY city, customerName, orderNumber, orderDate
ORDER BY customerName, orderDate

/* RESULTAT ==> 16 lignes / Classic Legends / 10115 / 21665.98 */


-- suite du cours
INSERT INTO table (  ) VALUES ('valeur 1', 'valeur 2', ...)

INSERT INTO office (city, 	phone,  addressLine1 )VALUES ('Paris', '0651203265', 'rue de la republique')

UPDATE Customers
SET contactName = 'Alfred Schmidt'
WHERE customerNumber = 1;


DELETE FROM `customer`
WHERE `customerNumber` = 103
-- attention à ne pas faire quand le prof n'est pas là
DELETE * FROM *
DROP TABLE users
