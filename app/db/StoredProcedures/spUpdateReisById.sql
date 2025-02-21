USE TravelEasy;

DROP PROCEDURE IF EXISTS spUpdateReisById;

DELIMITER //

CREATE PROCEDURE spUpdateReisById(
    IN Id             INT UNSIGNED,
    IN MedewerkerId   INT,
    IN VertrekId      INT,
    IN BestemmingId   INT,
    IN Vluchtnummer   VARCHAR(20),
    IN Vertrekdatum   DATE,
    IN Vertrektijd    TIME,
    IN Aankomstdatum  DATE,
    IN Aankomsttijd   TIME,
    IN Reisstatus     VARCHAR(20),
    IN IsActief       BOOLEAN,
    IN Opmerking      TEXT
)
BEGIN
    UPDATE  Reis AS R
    SET     R.MedewerkerId = MedewerkerId,
            R.VertrekId = VertrekId,
            R.BestemmingId = BestemmingId,
            R.Vluchtnummer = Vluchtnummer,
            R.Vertrekdatum = Vertrekdatum,
            R.Vertrektijd = Vertrektijd,
            R.Aankomstdatum = Aankomstdatum,
            R.Aankomsttijd = Aankomsttijd,
            R.Reisstatus = Reisstatus,
            R.IsActief = IsActief,
            R.Opmerking = Opmerking,
            R.DatumGewijzigd = CURRENT_TIMESTAMP
    WHERE   R.Id = Id;
END //
DELIMITER ;