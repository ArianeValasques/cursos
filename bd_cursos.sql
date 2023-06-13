

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


CREATE TABLE IF NOT EXISTS `cursos`.`Cursos` (
  `idCursos` INT NOT NULL AUTO_INCREMENT,
  `nome_curso` VARCHAR(45) NULL,
  `carga_horaria` INT NULL,
  PRIMARY KEY (`idCursos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cursos`.`Alunos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cursos`.`Alunos` (
  `idAlunos` INT NOT NULL AUTO_INCREMENT,
  `nome_aluno` VARCHAR(45) NULL,
  `cpf` VARCHAR(15) NULL,
  `email` VARCHAR(45) NULL,
  `telefone` VARCHAR(20) NULL,
  `data_nascimento` DATE NULL,
  PRIMARY KEY (`idAlunos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cursos`.`Alunos_Cursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cursos`.`Alunos_Cursos` (
  `idAlunos_Cursos` INT NOT NULL AUTO_INCREMENT,
  `Alunos_idAlunos` INT NOT NULL,
  `Cursos_idCursos` INT NOT NULL,
  PRIMARY KEY (`idAlunos_Cursos`),
  INDEX `fk_Alunos_Cursos_Alunos_idx` (`Alunos_idAlunos` ASC) VISIBLE,
  INDEX `fk_Alunos_Cursos_Cursos1_idx` (`Cursos_idCursos` ASC) VISIBLE,
  CONSTRAINT `fk_Alunos_Cursos_Alunos`
    FOREIGN KEY (`Alunos_idAlunos`)
    REFERENCES `cursos`.`Alunos` (`idAlunos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Alunos_Cursos_Cursos1`
    FOREIGN KEY (`Cursos_idCursos`)
    REFERENCES `cursos`.`Cursos` (`idCursos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO alunos (nome_aluno, cpf, email, telefone, data_nascimento) VALUES ('Marcelo Andrade Cavalcante', 'user1@email.br', '73988452321','123.456.789-99', '1982-04-01');
INSERT INTO alunos (nome_aluno, cpf, email, telefone, data_nascimento) VALUES ('Weberson Bandeira Lucio', 'user2@email.br', '73988452322', '782.683.091-56', '2000-12-07');
INSERT INTO alunos (nome_aluno, cpf, email, telefone, data_nascimento) VALUES ('Thales Neves Vidal', 'user3@email.br', '73988452323', '322.862.644-06', '1981-02-13');
INSERT INTO alunos (nome_aluno, cpf, email, telefone, data_nascimento) VALUES ('Wellington Augusto Giron', 'user4@email.br', '73988452324', '437.478.681-34', '1963-01-24');
INSERT INTO alunos (nome_aluno, cpf, email, telefone, data_nascimento) VALUES ('Jander Cunha Monteiro', 'user5@email.br', '73988452325', '631.285.741-70', '1992-10-07');
INSERT INTO alunos (nome_aluno, cpf, email, telefone, data_nascimento) VALUES ('Adriana Gadelha Couto', 'user6@email.br', '73988452326', '121.982.870-05', '1980-02-21');
INSERT INTO alunos (nome_aluno, cpf, email, telefone, data_nascimento) VALUES ('Marisa Nazare Robadey', 'user7@email.br', '73988452327', '612.714.439-61', '1973-08-02');
INSERT INTO alunos (nome_aluno, cpf, email, telefone, data_nascimento) VALUES ('Lenir Ignacia Vieira', 'user8@email.br', '73988452328', '693.649.264-98', '1971-03-30');
INSERT INTO alunos (nome_aluno, cpf, email, telefone, data_nascimento) VALUES ('Paula Soares Guimarães', 'user9@email.br', '73988452329', '874.828.347-96', '1995-10-29');
INSERT INTO alunos (nome_aluno, cpf, email, telefone, data_nascimento) VALUES ('Vanderlina Passos da Cunha', 'user10@email.br', '73988452320', '961.161.617-15', '1980-11-11');
INSERT INTO alunos (nome_aluno, cpf, email, telefone, data_nascimento) VALUES ('Jhonathan Guzzo Velasco', 'user11@email.br', '73988452311', '245.086.825-96', '1957-11-30');
INSERT INTO alunos (nome_aluno, cpf, email, telefone, data_nascimento) VALUES ('Denair Dinis Donato', 'user12@email.br', '73988452312', '178.967.355-04', '1980-05-10');
INSERT INTO alunos (nome_aluno, cpf, email, telefone, data_nascimento) VALUES ('Italo Thomaz Bonimo', 'user13@email.br', '73988452332', '047.875.365-91', '1978-08-13');
INSERT INTO alunos (nome_aluno, cpf, email, telefone, data_nascimento) VALUES ('Laudemar Vargas Branco', 'user14@email.br', '73988452342', '814.274.225-08', '2000-05-25');
INSERT INTO alunos (nome_aluno, cpf, email, telefone, data_nascimento) VALUES ('Hilton Felix Conceição', 'user15@email.br', '73988452522', '649.262.785-70', '1991-01-03');
INSERT INTO alunos (nome_aluno, cpf, email, telefone, data_nascimento) VALUES ('Rosani Valle Machado', 'user16@email.br', '73988452622', '996.899.905-94', '1993-09-09');
INSERT INTO alunos (nome_aluno, cpf, email, telefone, data_nascimento) VALUES ('Ana Caroline de Jesus Mourão', 'user17@email.br', '73988457322', '283.275.815-03', '1996-07-01');
INSERT INTO alunos (nome_aluno, cpf, email, telefone, data_nascimento) VALUES ('Jania Portela Bueno', 'user18@email.br', '73988458322', '747.023.645-70', '1982-07-12');
INSERT INTO alunos (nome_aluno, cpf, email, telefone, data_nascimento) VALUES ('Erica Bento Felizardo', 'user19@email.br', '73988452922', '764.741.815-75', '1982-04-01');
INSERT INTO alunos (nome_aluno, cpf, email, telefone, data_nascimento) VALUES ('Agostinha Firmino Serra', 'user20@email.br', '73988472322', '083.349.635-21', '1975-01-19');

SELECT*FROM alunos;

INSERT INTO cursos (nome_curso, carga_horaria) VALUES ('Java - Programação Orientada a Objetos', '51');
INSERT INTO cursos (nome_curso, carga_horaria) VALUES ('C# - Programação Orientada a Objetos', '60');
INSERT INTO cursos (nome_curso, carga_horaria) VALUES ('Introdução à programação de computadores', '15');
INSERT INTO cursos (nome_curso, carga_horaria) VALUES ('Python 3 Completo', '45');
INSERT INTO cursos (nome_curso, carga_horaria) VALUES ('Curso completo em C e C++', '40');
INSERT INTO cursos (nome_curso, carga_horaria) VALUES ('Lógica de Programação', '12');
INSERT INTO cursos (nome_curso, carga_horaria) VALUES ('Desenvolvimento de aplicativos Android', '50');

SELECT*FROM cursos;

INSERT INTO alunos_cursos (Alunos_idAlunos, Cursos_idCursos) VALUES ('1', '3');
INSERT INTO alunos_cursos (Alunos_idAlunos, Cursos_idCursos) VALUES ('2', '2');
INSERT INTO alunos_cursos (Alunos_idAlunos, Cursos_idCursos) VALUES ('3', '1');
INSERT INTO alunos_cursos (Alunos_idAlunos, Cursos_idCursos) VALUES ('4', '2');
INSERT INTO alunos_cursos (Alunos_idAlunos, Cursos_idCursos) VALUES ('5', '1');
INSERT INTO alunos_cursos (Alunos_idAlunos, Cursos_idCursos) VALUES ('1', '3');

SELECT*FROM alunos_cursos;