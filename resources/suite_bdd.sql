CREATE TABLE 'sousCategorieRecette'(
    'idsousCategorieRecette' int NOT NULL,
    'nomsousCategorieRecette' varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE 'Auteur'(
    'idAuteur' int NOT NULL,
    'nomAuteur' varchar(50) NOT NULL,
    'prenomAuteur' varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE 'Taxes'(
    'IdTVA' int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE 'Unites'(
    'IIdUnite' int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;