CREATE TABLE `contratos` (
  `codContrato` BIGINT(13) NOT NULL AUTO_INCREMENT,
  `fchContrato` DATE,
  `nombreEmpContrato` varchar(150) NULL,
  `numIdeContrato` VARCHAR(20) NULL,
  `durMeserContrato` INT(5) NULL,
  `tipoContrato` CHAR(3) NULL,
  `sueldoBaseContrato` DECIMAL(13,4) NULL,
  `renovableContrato` CHAR(3) NULL,
  `estadoContrato` CHAR(3) NULL,
  PRIMARY KEY (`codContrato`));
