USE TravelEasy;

DROP PROCEDURE IF EXISTS spCreateReis;

DELIMITER //

CREATE PROCEDURE spCreateReis(
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
    INSERT INTO Reis (
        MedewerkerId,
        VertrekId,
        BestemmingId,
        Vluchtnummer,
        Vertrekdatum,
        Vertrektijd,
        Aankomstdatum,
        Aankomsttijd,
        Reisstatus,
        IsActief,
        Opmerking,
        DatumAangemaakt,
        DatumGewijzigd
    ) VALUES (
        MedewerkerId,
        VertrekId,
        BestemmingId,
        Vluchtnummer,
        Vertrekdatum,
        Vertrektijd,
        Aankomstdatum,
        Aankomsttijd,
        Reisstatus,
        IsActief,
        Opmerking,
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP
    );
END //
DELIMITER ;