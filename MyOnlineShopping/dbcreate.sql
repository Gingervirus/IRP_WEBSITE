CREATE TABLE `MyOnlineShop`.`products` ( `product_id` INT(100) NOT NULL AUTO_INCREMENT , `product_cat` INT(100) NOT NULL , `product_brand` INT(100) NOT NULL , `product_title` VARCHAR(255) NOT NULL , `product_price` INT(100) NOT NULL , `product_desc` TEXT NOT NULL , `product_image` TEXT NOT NULL , `product_keywords` TEXT NOT NULL , PRIMARY KEY (`product_id`))
CREATE TABLE `myonlineshop`.`categories` ( `cat_id` INT(100) NOT NULL AUTO_INCREMENT , `cat_title` TEXT NOT NULL , PRIMARY KEY (`cat_id`))
CREATE TABLE `myonlineshop`.`brands` ( `brand_id` INT(100) NOT NULL AUTO_INCREMENT , `brand_title` TEXT NOT NULL , PRIMARY KEY (`brand_id`))