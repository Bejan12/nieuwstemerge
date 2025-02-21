USE TravelEasy;

DROP PROCEDURE IF EXISTS spDeleteReisById;

DELIMITER //

CREATE PROCEDURE spDeleteReisById(
    IN Id INT UNSIGNED
)
BEGIN
    DELETE  
    FROM    Reis AS R
    WHERE   R.Id = Id;
END //
DELIMITER ;