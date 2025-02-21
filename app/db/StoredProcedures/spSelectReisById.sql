USE TravelEasy;

DROP PROCEDURE IF EXISTS spSelectReisById;

DELIMITER //

CREATE PROCEDURE spSelectReisById(
    IN Id INT UNSIGNED
)
BEGIN
    SELECT  R.Id,
            R.MedewerkerId,
            R.VertrekId,
            R.BestemmingId,
            R.Vluchtnummer,
            R.Vertrekdatum,
            R.Vertrektijd,
            R.Aankomstdatum,
            R.Aankomsttijd,
            R.Reisstatus,
            R.IsActief,
            R.Opmerking,
            R.DatumAangemaakt,
            R.DatumGewijzigd
    FROM    Reis AS R
    WHERE   R.Id = Id;
END //
DELIMITER ;