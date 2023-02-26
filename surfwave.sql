
DROP DATABASE IF EXISTS surfwave;
CREATE DATABASE surfwave;
USE surfwave;

CREATE TABLE surfwave.EQUIPIER (
    codeEq      VARCHAR(5) NOT NULL , 
    surnomEq    VARCHAR(15) NOT NULL , 
    nomEq       VARCHAR(50) , 
    fonctionEq  VARCHAR(15) NOT NULL ,
    PRIMARY KEY (codeEq)	
);
INSERT INTO surfwave.EQUIPIER (codeEq,surnomEq,nomEq,fonctionEq) VALUES
    ( 'BOSS'  , 'Gourou' 	, 'MARCON Emmanuel'	, 'Directeur' ) ,
    ( 'DAN'   , 'Dantel' 	, 'CASTOR Jean'	, 'Commercial' ) , 
    ( 'DID'   , 'Didi' 	, 'LAMBROUY Didier' , 'Commercial' ) , 
    ( 'PAT'   , 'Patou' 	, NULL			, 'Moniteur' ) , 
    ( 'FRED'  , 'Fredo' 	, NULL			, 'Moniteur' ) , 
    ( 'WIL'   , 'Will' 	, 'SOVÉ Willy'	, 'Moniteur' ) , 
    ( 'KIM'   , 'Kimi' 	, 'GAGA Géralde'	, 'e-commerce' ) , 
    ( 'ADJ'   , 'Isa' 	, 'FONFEC Sophie'	, 'e-commerce' ) , 
    ( 'FAN'   , 'Fany' 	, NULL			, 'e-commerce' ) ;


CREATE TABLE surfwave.QUESTION (
    idQuest 	INT 		NOT NULL , 
    libQuest VARCHAR(100) NOT NULL ,
    PRIMARY KEY (idQuest)	
);
CREATE TABLE surfwave.QDP (
    codeEq   VARCHAR(5)   NOT NULL , 
    idQuest 	INT 		NOT NULL , 
    reponse  VARCHAR(500) , 
    PRIMARY KEY (codeEq , idQuest) , 
    FOREIGN KEY (codeEq) REFERENCES surfwave.EQUIPIER(codeEq) , 
    FOREIGN KEY (idQuest) REFERENCES surfwave.QUESTION(idQuest)
);

INSERT INTO surfwave.QUESTION  (idQuest,libQuest) VALUES
    ( 1  , "Ma qualité préférée chez les autres."  ) ,
    ( 2  , "Mon idée du bonheur. "  ) ,
    ( 3  , "La couleur que je préfère."  ) ,
    ( 4  , "Le plat que je préfère."  ) ,
    ( 5  , "En quoi je voudrais être réincarné.e."  ) ;
INSERT INTO surfwave.QDP  (codeEq,idQuest,reponse) VALUES
    ( "BOSS" , 1  , "Présider et décider"  ) ,
    ( "BOSS" , 2  , "Etre roi de ce pays"  ) ,
    ( "BOSS" , 3  , "Jaune sable"  ) ,
    ( "BOSS" , 4  , "La dinde de la cour"  ) ,
    ( "BOSS" , 5  , "Louis XIV"  );

CREATE TABLE catpro (
    categoProd  VARCHAR(2) NOT NULL  , 
    libCatego 	 VARCHAR(40) NOT NULL ,
    PRIMARY KEY (categoProd)	
);

CREATE TABLE surfwave.temps
    (codeTemps VARCHAR(50) NOT NULL,
    PRIMARY KEY (codeTemps));

CREATE TABLE surfwave.tarif
    (codeTemps varchar(50) NOT NULL,
    codeCat varchar(50) NOT NULL,
    tarif INT,
CONSTRAINT FOREIGN KEY (codeTemps) REFERENCES surfwave.temps(codeTemps),
CONSTRAINT FOREIGN KEY (codeCat) REFERENCES surfwave.CATPRO(categoProd),
CONSTRAINT PRIMARY KEY (codeTemps,codeCat));

CREATE TABLE surfwave.users
    (id_user VARCHAR(50)  PRIMARY KEY not null,
    password_user varchar(255) NOT NULL);


CREATE TABLE PRODUITS (
    idProd      INT(6) NOT NULL AUTO_INCREMENT , 
    libProd   	 VARCHAR(40) NOT NULL , 
    alaune   	 BOOLEAN  DEFAULT FALSE , 
    puProd    	 DECIMAL(6,2) NOT NULL , 
    descProd 	 VARCHAR(200) NOT NULL ,
    catProd     VARCHAR(2) NOT NULL ,
    nomImage    VARCHAR(255),
    PRIMARY KEY (idProd)	
);


ALTER TABLE PRODUITS 
	ADD CONSTRAINT PRODUITS_FK1 
		FOREIGN KEY (catProd) REFERENCES catpro(categoProd)
;




INSERT INTO surfwave.users(id_user,password_user) VALUES (AES_ENCRYPT('christian','0x89cd9986f89e70d43f0b349e0e294172'), AES_ENCRYPT('1997','0x89cd9986f89e70d43f0b349e0e294172'));

INSERT INTO surfwave.catpro(categoProd,libCatego) VALUES
    ('BB', 'bodyboard'),
    ('CO', 'combinaison'),
    ('PS', 'planche de surf');

INSERT INTO PRODUITS(libProd,alaune,puProd,descProd,catProd,nomImage) VALUES
('Demibu',true,689.00,'L’idée de la Demibu de Phil Grace est venue ... sur un 6’6','PS','planchedesurf'),
('Origami Sac à dos de surf étache',true,105.99,"L’idée de l'origami de Phil Grace est venue ... sur un 6’6",'CO','sacados'),
('Syncro 4/3mm ',true,159.00,'- Combinaison de surf intégrale zip poitrine. L’idée de la synchro de Phil Grace est venue ... sur un 6’6','PS','combinaison'),
('Samoa 19',true,65.00,"L’idée de la Samoa de Phil Grace est venue ... sur un 6’6",'CO','shortdesurf'),
('Bodyboard Flood Dynamx',true,65.00,' 40" White Lime + Leash L’idée de la BodyboardFlood de Phil Grace est venue ... sur un 6’6','BB','bodyboard'),
('Active Lycra à manches longues',true,39.50,"L’idée de l'active de Phil Grace est venue ... sur un 6’6",'CO','lycra');

INSERT INTO surfwave.temps(codeTemps) VALUES
    ('1 heure'),
    ('2 heures'),
    ('3 heures'),
    ('4 heures'),
    ('1 jour'),
    ('2 jours'),
    ('3 jours'),
    ('4 jours'),
    ('5 jours'),
    ('6 jours');

INSERT INTO surfwave.tarif(codeTemps,codeCat,tarif) VALUES
     ('1 heure','PS',10),
    ('2 heures','PS',15),
    ('3 heures','PS',20),
    ('4 heures','PS',25),
    ('1 jour','PS',35),
    ('2 jours','PS',45),
    ('3 jours','PS',55),
    ('4 jours','PS',65),
    ('5 jours','PS',75),
    ('6 jours','PS',85),
    ('1 heure','BB',7),
    ('2 heures','BB',10),
    ('3 heures','BB',15),
    ('4 heures','BB',20),
    ('1 jour','BB',25),
    ('2 jours','BB',35),
    ('3 jours','BB',45),
    ('4 jours','BB',55),
    ('5 jours','BB',65),
    ('6 jours','BB',75),
    ('1 heure','CO',7),
    ('2 heures','CO',10),
    ('3 heures','CO',15),
    ('4 heures','CO',20),
    ('1 jour','CO',25),
    ('2 jours','CO',35),
    ('3 jours','CO',45),
    ('4 jours','CO',55),
    ('5 jours','CO',65),
    ('6 jours','CO',75);



/*-------------------------- REQUETE SQL -----------------*/

/* affiche les prix par catégorie d'heure*/
SELECT DISTINCT tarif.codeTemps, t1.tarif AS PS,t2.tarif AS BB,t3.tarif AS CO
    FROM tarif,(SELECT tarif.codeTemps,tarif.tarif
                FROM tarif
                WHERE tarif.codeCat='PS') as t1,
                (SELECT tarif.codeTemps,tarif.tarif
                FROM tarif
                WHERE tarif.codeCat='BB') as t2,
                (SELECT tarif.codeTemps,tarif.tarif
                FROM tarif
                WHERE tarif.codeCat='CO') as t3
    WHERE tarif.codeTemps=t1.codeTemps
    AND t1.codeTemps=t2.codeTemps
    AND t1.codeTemps=t3.codeTemps

/*supprime par categorie*/
    DELETE 
    FROM tarif 
    WHERE tarif.codeTemps='1 heure';
/*insertion dans les tarifs */
    INSERT INTO surfwave.tarif (codeTemps,codeCat,tarif) VALUES 
        ('1 heure', 'PS',10),
        ('1 heure', 'BB',7),
        ('1 heure', 'CO',7);
/*Update par categorie*/
    UPDATE surfwave.tarif 
    SET tarif=75
    WHERE codeTemps = '1 heure'
    AND codeCat IN ('PS','BB','CO');

/*---------------------------*/
    INSERT INTO surfwave.catpro(categoProd,libCatego) VALUES 
    ('HH','coucou');

    UPDATE surfwave.tarif 
    SET codeCat = 'HH'
    WHERE codeCat = 'BB';
    
    UPDATE surfwave.produits 
    SET catProd = 'HH'
    WHERE catProd = 'BB';

    DELETE FROM surfwave.catpro 
    WHERE categoProd = 'BB';

/*--*/
    UPDATE surfwave.catpro 
    SET categoProd='HH',
        libCatego = 'coucou'
    WHERE categoProd = 'BB'

/*---------------------------*/
    INSERT INTO surfwave.catpro(categoProd,libCatego) VALUES 
    ($_POST['categoProd'],$_POST['libCatego']);

    UPDATE surfwave.tarif 
    SET codeCat = $_POST['categoProd']
    WHERE codeCat = $_POST['validating_edit'];
    
    UPDATE surfwave.produits 
    SET catProd = $_POST['categoProd']
    WHERE catProd = $_POST['validating_edit'];

    DELETE FROM surfwave.catpro 
    WHERE categoProd = $_POST['validating_edit'];

/*--*/
    UPDATE surfwave.catpro 
    SET categoProd=$_POST['categoProd'],
        libCatego =$_POST['libCatego']
    WHERE categoProd = $_POST['validating_edit']

    id=categoProd;
    valeur_id=$_POST['validating_edit']
    data = $_POST['categoProd'],$_POST['libCatego']