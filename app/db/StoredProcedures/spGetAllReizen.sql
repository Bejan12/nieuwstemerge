USE TravelEasy;

DROP PROCEDURE IF EXISTS spGetAllReizen;

DELIMITER //

CREATE PROCEDURE spGetAllReizen()
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
    ORDER BY R.Id ASC;
END //
DELIMITER ;