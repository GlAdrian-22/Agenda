CREATE DATABASE agenda;
  USE agenda;
    
       
    CREATE TABLE categoria (cat_id int AUTO_INCREMENT,
                           nombre varchar(255),
                           descripcion varchar(255),
                           PRIMARY KEY(cat_id));

     CREATE TABLE contacto (cont_id INT AUTO_INCREMENT,
                          cat_nom varchar(255),
                          nombre varchar(255),
                          ap_pt varchar(255),
                          ap_mt varchar(255),
                          telfono varchar(255),
                          email varchar(255),
                          PRIMARY KEY(cont_id)
                          FOREIGN KEY (cont_id) REFERENCES categoria(cat_id));