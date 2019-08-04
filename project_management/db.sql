
CREATE TABLE project (
id INT NOT NULL AUTO_INCREMENT,  
project_name VARCHAR(50) NOT NULL, 
project_type VARCHAR(50) NOT NULL,
cost INT(50) NOT NULL,
start_date DATE NOT NULL,
end_date DATE NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE contractor (
id INT NOT NULL AUTO_INCREMENT,
contractor_name VARCHAR(20) NOT NULL,
contact BIGINT NOT NULL,
project_name INT NOT NULL,
address VARCHAR(20) NOT NULL,
machine_list VARCHAR(100) NOT NULL,
machine_cost INT(100) NOT NULL,
advance_payment INT(100) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (project_name)
	REFERENCES project(id)
	ON DELETE CASCADE
);

CREATE TABLE vehicle (
id INT NOT NULL AUTO_INCREMENT,
vehicle_name VARCHAR(20) NOT NULL,
vehicle_number VARCHAR(20) NOT NULL,
PRIMARY KEY (id)
);


CREATE TABLE driver (
id INT NOT NULL AUTO_INCREMENT,
vehicle_number INT NOT NULL,
date DATE NOT NULL,
driver_name VARCHAR(40) NOT NULL,
payment INT(50) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (vehicle_number)
	REFERENCES vehicle(id)
	ON DELETE CASCADE
);

CREATE TABLE fuel (
id INT NOT NULL AUTO_INCREMENT,
fuel_name VARCHAR(20) NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE fuel_record (
id INT NOT NULL AUTO_INCREMENT,
vehicle_number INT NOT NULL,
date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
fuel_name INT NOT NULL,
amount INT(50) NOT NULL,
quantity VARCHAR(50) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (vehicle_number)
	REFERENCES vehicle(id)
	ON DELETE CASCADE,
FOREIGN KEY (fuel_name)
	REFERENCES fuel(id)
	ON DELETE CASCADE	
);

CREATE TABLE maintenance_record (
id INT NOT NULL AUTO_INCREMENT,
vehicle_number INT NOT NULL,
maintenence_details VARCHAR(200) NOT NULL,
date DATE NOT NULL,
price INT(100) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (vehicle_number)
	REFERENCES vehicle(id)
	ON DELETE CASCADE
);

CREATE TABLE users (
id int(11) NOT NULL AUTO_INCREMENT,
username VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE materials (
id INT NOT NULL AUTO_INCREMENT,
item_name VARCHAR(50) NOT NULL,
unit INT(50) NOT NULL,
price VARCHAR(50) NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE materials_supply (
id INT NOT NULL AUTO_INCREMENT,
ordered_date DATE NOT NULL,
supplied_date DATE NULL,
contractor_name INT NOT NULL,
item_name INT NOT NULL,
price INT NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (contractor_name)
	REFERENCES contractor(id)
	ON DELETE CASCADE,
FOREIGN KEY (item_name)
	REFERENCES materials(id)
	ON DELETE CASCADE,
FOREIGN KEY (price)
	REFERENCES materials(id)
	ON DELETE CASCADE		
);

